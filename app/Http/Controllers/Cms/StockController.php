<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use DB;
use Auth;
use NotificationHelper;
use App\Product;
use App\Unit;
use App\Branch;
use App\InventoryTransaction;
use App\InventoryTransactionDetail;
use App\ProductStock;

class StockController extends Controller
{   
    private $icon = 'icon-layers';

    // StockIn
    public function stockIn()
    {
        $branches = Branch::all();
        $data = [
            'title' => 'Stock In',
            'icon' => $this->icon,
            'branches' => $branches
        ];
        
        return view('cms.stock.stock-in')->with($data);
    }

    public function saveStockIn(Request $request)
    {
        $request->validate([
            'from_branch_id' => 'required|min:1',
            'inventory.*.product_id' => 'required|min:1',
            'inventory.*.unit_id' => 'required|min:1',
            'inventory.*.quantity' => 'required|min:1',
        ]);

        return $this->stockTransaction($request, 'stock_in');
    }

    public function findStockInProduct(Request $request)
    {
        $products = Product::where('stock_type', 'product')
                            ->where('name', 'like', '%'.$request->search.'%')
                            ->limit(10)
                            ->get();
        $response = array();
        foreach($products as $product) {
            $response[] = ["value" => $product->id, "label" => $product->name];
        }
        return response()->json($response);

    }

    public function findStockInProductById(Request $request)
    {
        $product = Product::where('stock_type', 'product')
                            ->where('id', $request->id)
                            ->first();

        if($product == null) return response()->json([ 'status' => 0 ]);

        $units = Unit::all();
        
        $tr = view('cms.stock.ajax.stock-in')
              ->with([
                  'product' => $product,
                  'units' => $units
                ])
              ->render();
        return response()->json([
            'status' => 1,
            'tr' => $tr,
        ]);

    }
    // End StockIn

    // Wasted
    public function wasted()
    {
        $branches = Branch::all();
        $data = [
            'title' => 'Wasted Stock',
            'icon' => $this->icon,
            'branches' => $branches
        ];
        
        return view('cms.stock.wasted')->with($data);
    }

    public function saveWasted(Request $request)
    {
        $request->validate([
            'from_branch_id' => 'required|min:1',
            'inventory.*.product_id' => 'required|min:1',
            'inventory.*.unit_id' => 'required|min:1',
            'inventory.*.quantity' => 'required|min:1',
        ]);

        return $this->stockTransaction($request, 'wasted');
    }

    // Adjust Stock
    public function adjust()
    {
        $branches = Branch::all();
        $adjustType = [ 'adjust_add' => 'Adjust Add', 'adjust_sub' => 'Adjust Sub', ];
        $data = [
            'title' => 'Adjust Stock',
            'icon' => $this->icon,
            'branches' => $branches,
            'adjustType' => $adjustType
        ];
        
        return view('cms.stock.adjust')->with($data);
    }

    public function saveAdjust(Request $request)
    {
        $request->validate([
            'from_branch_id' => 'required|min:1',
            'inventory.*.product_id' => 'required|min:1',
            'inventory.*.unit_id' => 'required|min:1',
            'inventory.*.quantity' => 'required|min:1',
            'type' => [
                'required',
                Rule::in(['adjust_add', 'adjust_sub']),
            ],
        ]);
        
        return $this->stockTransaction($request, $request->type);
    }

    // Transfer Stock
    public function transferStock()
    {
        $fromBranches = Branch::all();
        $toBranches = Branch::all();
        $adjustType = [ 'adjust_add' => 'Adjust Add', 'adjust_sub' => 'Adjust Sub', ];
        $data = [
            'title' => 'Adjust Stock',
            'icon' => $this->icon,
            'fromBranches' => $fromBranches,
            'toBranches' => $toBranches,
            'adjustType' => $adjustType
        ];
        
        return view('cms.stock.transfer-stock')->with($data);
    }

    public function saveTransferStock(Request $request)
    {
        $request->validate([
            'from_branch_id' => 'required|min:1',
            'to_branch_id' => 'required|min:1',
            'inventory.*.product_id' => 'required|min:1',
            'inventory.*.unit_id' => 'required|min:1',
            'inventory.*.quantity' => 'required|min:1',
        ]);
        
        if($request->from_branch_id == $request->to_branch_id) {
            NotificationHelper::setErrorNotification('Cannot Transfer To Same Branch', true);
            return back()->withInput();
        }

        try 
        {   

            DB::transaction(function () use($request) {
                $from_branch = Branch::find($request->from_branch_id);
                if($from_branch == null) {
                    NotificationHelper::setErrorNotification('Invalid From Branch', true);
                    return back()->withInput();
                }

                $to_branch = Branch::find($request->to_branch_id);
                if($to_branch == null) {
                    NotificationHelper::setErrorNotification('Invalid To Branch', true);
                    return back()->withInput();
                }
                
                
                $inventoryTransaction = InventoryTransaction::create([
                    'from_branch_id' => $from_branch->id,
                    'to_branch_id' => $to_branch->id,
                    'type' => 'transfer',
                    'created_by' => Auth::id(),
                ]);

                $inventoryTransactionDetails = [];

                foreach($request->inventory as $inventory) {
                    $inventoryTransactionDetails[] = array_merge(
                        ['inventory_transaction_id' => $inventoryTransaction->id],
                        $inventory
                    );

                    $product_id =  $inventory['product_id'];
                    $quantity =  $inventory['quantity'];


                    $from_stock = ProductStock::where('branch_id',  $from_branch->id)
                                            ->where('product_id', $product_id)
                                            ->first();

                    $to_stock = ProductStock::where('branch_id',  $to_branch->id)
                                            ->where('product_id', $product_id)
                                            ->first();

                    if($from_stock == null) {
                        NotificationHelper::setErrorNotification('No product to transfer', true);
                        return back()->withInput();
                    }
                    

                    $from_branch_qty = $from_stock->qty - $quantity;
                    ProductStock::where('branch_id',  $from_branch->id)
                                ->where('product_id', $product_id)
                                ->update(['qty' => $from_branch_qty]);

                    if($to_stock == null) {
                        ProductStock::create([
                            'branch_id' => $to_branch->id,
                            'product_id' => $product_id,
                            'qty' => $quantity
                        ]);
                    } else {
                        $to_branch_qty = $to_stock->qty + $quantity;
                        ProductStock::where('branch_id',  $to_branch->id)
                                ->where('product_id', $product_id)
                                ->update(['qty' => $to_branch_qty]);
                    }
                    
                }

                InventoryTransactionDetail::insert($inventoryTransactionDetails);

                // TODO Update Stock
            });

            NotificationHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

    // =============== Private Method =============

    private function stockTransaction(Request $request, $type) {
        try 
        {   

            $stockType = ['stock_in', 'adjust_add', 'adjust_sub', 'wasted'];

            if (!in_array($type, $stockType)) {
                NotificationHelper::setErrorNotification('Invalid Stock Type', true);
                return back()->withInput();
            }

            DB::transaction(function () use($request, $type) {
                $branch = Branch::find($request->from_branch_id);
                if($branch == null) {
                    NotificationHelper::setErrorNotification('Invalid Branch', true);
                    return back()->withInput();
                }
                
                $inventoryTransaction = InventoryTransaction::create([
                    'from_branch_id' => $branch->id,
                    'type' => $type,
                    'created_by' => Auth::id(),
                ]);

                $inventoryTransactionDetails = [];

                foreach($request->inventory as $inventory) {
                    $inventoryTransactionDetails[] = array_merge(
                        ['inventory_transaction_id' => $inventoryTransaction->id],
                        $inventory
                    );

                    $product_id =  $inventory['product_id'];
                    $quantity =  $inventory['quantity'];


                    $stock = ProductStock::where('branch_id',  $branch->id)
                                            ->where('product_id', $product_id)
                                            ->first();
                    if($stock == null) {
                        if($type != 'stock_in') {
                            NotificationHelper::setErrorNotification('Stock Type is not stock in', true);
                            return back()->withInput();
                        }
                        ProductStock::create([
                            'branch_id' => $branch->id,
                            'product_id' => $product_id,
                            'qty' => $quantity
                        ]);
                    } else {
                        // If type = ['stock_in', 'adjust_add'] add stock other type will sub
                        $qty = in_array($type, ['stock_in', 'adjust_add']) ? ($stock->qty + $quantity) : ($stock->qty - $quantity);
                        ProductStock::where('branch_id',  $branch->id)
                                    ->where('product_id', $inventory['product_id'])
                                    ->update(['qty' => $qty]);
                    }
                    
                }

                InventoryTransactionDetail::insert($inventoryTransactionDetails);

                // TODO Update Stock
            });

            NotificationHelper::setSuccessNotification('created_success');
            return back();
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
    }

}
