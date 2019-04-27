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
            'inventory' => 'required'
        ]);

        try 
        {   
            DB::transaction(function () use($request) {
                $type = 'stock_in';
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



}
