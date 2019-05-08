<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use NotificationHelper;
use App\Room;
use App\Category;
use App\Product;
use App\Invoice;
use App\InvoiceDetail;
use App\InvoiceIngredientDetail;
use App\ProductIngredient;
use App\Branch;

class FrontEndController extends Controller
{
    
    public function index(Request $request)
    {
        $room_id = $request->room_id;
        $room = Room::where('id', $room_id)->first();
        if($room == null) {
            NotificationHelper::setErrorNotification('Please select room', true);
            return redirect()->route('front-end.room');
        }

        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'room' => $room
        ];

        return view('front-end.pos')->with($data);
    }

    public function room()
    {
        $data['rooms'] = Room::all();

        return view('front-end.room')->with($data);
    }
    
    public function chooseBranch()
    {
        $data['branches'] = Branch::all();

        return view('front-end.choose-branch')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|min:1',
            'invoice.*.product_id' => 'required|min:1',
            'invoice.*.qty' => 'required|min:1',
            'invoice.*.price' => 'required|min:1',
            'invoice.*.unit_id' => 'required|min:1',
        ]);

        // try
        // {

            DB::transaction(function () use($request) {
                
                $invoice = Invoice::create([
                    'room_id' => $request->room_id,
                    'branch_id' => 1,
                    'note' => 'test note',
                    'sub_total' => 0,
                    'discount' => 0,
                    'total' => 0,
                    'created_by' => Auth::id(),
                    'status' => 'paid'
                ]);

                foreach($request->invoice as $invDetail) {

                    $invoiceDetailProduct = Product::find($invDetail['product_id']);

                    $invoiceDetail = InvoiceDetail::create([
                        'invoice_id' => $invoice->id,
                        'product_id' => $invDetail['product_id'],
                        'quantity' => $invDetail['qty'],
                        'quantity_for_cut_stock' => $invoiceDetailProduct->quantity_for_cut_stock,
                        'price' => $invDetail['price'],
                        'unit_id' => $invDetail['unit_id']
                    ]);
                    
                    if($invoiceDetailProduct->stock_type == 'ingredient') {
                        $invoiceIngredientDetailProducts = ProductIngredient::where('product_id', $invoiceDetailProduct->id)->get();
                        
                        foreach($invoiceIngredientDetailProducts as $iidProduct) {

                            InvoiceIngredientDetail::create([
                                'invoice_detail_id' => $invoiceDetail->id,
                                'product_id' => $iidProduct->product_id,
                                'product_ingredient_id' => $iidProduct->id,
                                'qty' => 1,
                                'quantity_for_cut_stock' => $iidProduct->quantity_for_cut_stock,
                                'unit_id' => $iidProduct->unit_id
                            ]);
                        }

                    }

                }
                // TODO Update Stock
            });

            NotificationHelper::setSuccessNotification('created_success');
            return back();
        // }
        // catch (\Exception $e)
        // {
        //     NotificationHelper::errorNotification($e);
        //     return back()->withInput();
        // }

    }

    // AJAX FUNCTION

    public function getProduct(Request $request) {
        $product = Product::find($request->product_id);

        if($product == null) return response()->json([ 'status' => 0 ]);

        $data = view('front-end.ajax.get-product')
              ->with(['product' => $product])
              ->render();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

    public function getProductList(Request $request) {
        $products = Product::where('category_id', $request->category_id)->get();

        if($products == null || count($products) == 0) return response()->json([ 'status' => 0 ]);

        $data = view('front-end.ajax.get-product-list')
              ->with(['products' => $products])
              ->render();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }

}