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
            'product_id' => 'required|min:1',
            'unit_id' => 'required|min:1',
            'quanity' => 'required|min:1'
        ]);

        try 
        {   
            DB::transaction(function () use($request) {
                $type = 'stock_in';
                $branch = Branch::find($request->from_branch_id);
                if($branch == null) {
                    NotificationHelper::errorNotification('Invalid Branch', true);
                    return back()->withInput();
                }
                
                $inventoryTransaction = InventoryTransaction::create([
                    'from_branch_id' => $branch->id,
                    'type' => $type,
                    'created_by' => Auth::id(),
                ]);

                $inventoryTransactionDetails = [];
                $product_id = $request->product_id;
                $unit_id = $request->unit_id;
                $quanity = $request->quanity;

                if(count($product_id) != count($unit_id) || count($product_id) != count($quanity)) {
                    NotificationHelper::errorNotification('Invalid Give Data', true);
                    return back()->withInput();
                }

                for($i = 0; $i < count($product_id); $i++) {
                    $inventoryTransactionDetails[] = [
                        'inventory_transaction_id' => $inventoryTransaction->id,
                        'product_id' => $product_id[$i],
                        'unit_id' => $unit_id[$i],
                        'quanity' => $quanity[$i]
                    ];
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

    // Transfer
    public function transferStock()
    {
        $fromBranches = Branch::all();
        $toBranches = Branch::all();
        $data = [
            'title' => 'Transfer Stock',
            'icon' => $this->icon,
            'fromBranches' => $fromBranches,
            'toBranches' => $toBranches
        ];
        
        return view('cms.stock.transfer-stock')->with($data);
    }

    public function saveTransferStock(Request $request)
    {
        $request->validate([
            'from_branch_id' => 'required|min:1',
            'to_branch_id' => 'required|min:1',
            'product_id' => 'required|min:1',
            'unit_id' => 'required|min:1',
            'quanity' => 'required|min:1'
        ]);

        try 
        {   
            DB::transaction(function () use($request) {
                $type = 'transfer';
                $fromBranch = Branch::find($request->from_branch_id);
                if($fromBranch == null) {
                    NotificationHelper::errorNotification('Invalid From Branch', true);
                    return back()->withInput();
                }

                $toBranch = Branch::find($request->to_branch_id);
                if($toBranch == null) {
                    NotificationHelper::errorNotification('Invalid To Branch', true);
                    return back()->withInput();
                }
                
                
                $inventoryTransaction = InventoryTransaction::create([
                    'from_branch_id' => $fromBranch->id,
                    'to_branch_id' => $toBranch->id,
                    'type' => $type,
                    'created_by' => Auth::id(),
                ]);

                $inventoryTransactionDetails = [];
                $product_id = $request->product_id;
                $unit_id = $request->unit_id;
                $quanity = $request->quanity;

                if(count($product_id) != count($unit_id) || count($product_id) != count($quanity)) {
                    NotificationHelper::errorNotification('Invalid Give Data', true);
                    return back()->withInput();
                }

                for($i = 0; $i < count($product_id); $i++) {
                    $inventoryTransactionDetails[] = [
                        'inventory_transaction_id' => $inventoryTransaction->id,
                        'product_id' => $product_id[$i],
                        'unit_id' => $unit_id[$i],
                        'quanity' => $quanity[$i]
                    ];
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

    // Wasted
    public function wasted()
    {
        $branches = Branch::all();
        $data = [
            'title' => 'Wasted',
            'icon' => $this->icon,
            'branches' => $branches
        ];
        
        return view('cms.stock.wasted')->with($data);
    }

    public function saveWasted(Request $request)
    {
       dd($request->all());
    }

   

    // Adjust
    public function adjust()
    {   
        $adjustType = [
            'adjust_add' => 'Add',
            'adjust_sub' => 'Substract'
        ];
        $branches = Branch::all();
        $data = [
            'title' => 'Wasted',
            'icon' => $this->icon,
            'branches' => $branches,
            'adjustType' => $adjustType
        ];
        
        return view('cms.stock.adjust')->with($data);
    }

    public function saveAdjust(Request $request)
    {
       dd($request->all());
    }


}
