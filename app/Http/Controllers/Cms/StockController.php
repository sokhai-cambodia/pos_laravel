<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

use Auth;
use NotificationHelper;
use App\Product;
use App\Unit;
use App\Branch;


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
       dd($request->all());
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
       dd($request->all());
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
