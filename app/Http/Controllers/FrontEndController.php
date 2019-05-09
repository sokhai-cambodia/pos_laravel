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
use App\User;
use App\ProductStock;

class FrontEndController extends Controller
{

    public function index(Request $request)
    {
        $room_id = $request->room_id;
        $room = Room::where('id', $room_id)->first();
        if($room == null) {
            NotificationHelper::setErrorNotification('Please select room', true);
            return redirect()->route('pos.room');
        }

        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'room' => $room
        ];

        return view('pos.pos')->with($data);
    }

    public function room()
    {
        if(Auth::user()->use_branch_id == null) {
            return redirect()->route('pos.show-branch');
        }
        $data['rooms'] = Room::all();

        return view('pos.room')->with($data);
    }

    public function showBranch()
    {
        if(Auth::user()->use_branch_id != null) {
            return redirect()->route('pos.room');
        }

        $data['branches'] = Branch::all();
        return view('pos.choose-branch')->with($data);
    }

    public function chooseBranch($id)
    {
        $branch = Branch::find($id);
        if($branch == null) {
            NotificationHelper::setErrorNotification('invalid branch', true);
            return redirect()->route('pos.show-branch');
        }

        $user = User::find(Auth::id());
        $user->use_branch_id = $id;
        $user->save();

        return redirect()->route('pos.room');
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

        try
        {

            DB::transaction(function () use($request) {
                $branchId = Auth::user()->use_branch_id;

                $invoice = Invoice::create([
                    'room_id' => $request->room_id,
                    'branch_id' => $branchId,
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
                                'product_ingredient_id' => $iidProduct->product_ingredient_id,
                                'qty' => 1,
                                'quantity_for_cut_stock' => $iidProduct->quantity_for_cut_stock,
                                'unit_id' => $iidProduct->unit_id
                            ]);

                            $qtyCutStock = $iidProduct->quantity_for_cut_stock * $invDetail['qty'];
                            ProductStock::cutStock($branchId, $iidProduct->product_ingredient_id, $qtyCutStock);

                        }

                    } else {
                        $qtyCutStock = $invoiceDetailProduct->quantity_for_cut_stock * $invDetail['qty'];
                        ProductStock::cutStock($branchId, $invoiceDetailProduct->id, $qtyCutStock);
                    }

                }
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

    // AJAX FUNCTION

    public function getProduct(Request $request) {
        $product = Product::find($request->product_id);

        if($product == null) return response()->json([ 'status' => 0 ]);

        $data = view('pos.ajax.get-product')
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

        $data = view('pos.ajax.get-product-list')
              ->with(['products' => $products])
              ->render();

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);
    }



}