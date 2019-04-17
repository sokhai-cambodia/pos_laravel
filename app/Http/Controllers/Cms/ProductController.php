<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use Auth;
use DB;

// Use Helper
use NotificationHelper;
use FileHelper;

// Use Model
use App\Product;
use App\Category;
use App\Unit;
use App\ProductIngredient;

class ProductController extends Controller
{
    private $PATH = 'assets/uploads/products';
    
    public function index()
    {
        return view('cms.product.index');
    }

    public function getProductLists()
    {
        return Laratables::recordsOf(Product::class);
    }

    public function create()
    {
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        return view('cms.product.create')->with($data);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'stockType' => 'required',
            'categoryId' => 'required',
            'unitId' => 'required',
            'price' => 'required',
            'quanityForCutStock' => 'required'

        ]);
        
        if($request->stockType == 'ingredient') {
            $request->validate([
                'iProductId' => 'required|min:1',
                'iUnitId' => 'required|min:1',
                'iQuanityForCutStock' => 'required|min:1',
    
            ]);
        }
        
        try 
        {   
            DB::transaction(function () use($request) {
                $stockType = $request->stockType;
                $isIngredient = isset($request->isIngredient) ? 1 : 0;
                $photo = null;
                if($request->hasFile('photo')) {
                    $photo = FileHelper::upload($this->PATH, $request->photo);
                }
                
                $product = Product::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'photo' => $photo,
                    'stock_type' => $stockType,
                    'is_ingredient' => $isIngredient,
                    'price' => $request->price,
                    'quanity_for_cut_stock' => $request->quanityForCutStock,
                    'unit_id' => $request->unitId,
                    'category_id' => $request->categoryId,
                    'created_by' => Auth::id(),
                ]);

                if($stockType == 'ingredient') {
                    $productIngredients = [];
                    $iProductId = $request->iProductId;
                    $iUnitId = $request->iUnitId;
                    $iQuanityForCutStock = $request->iQuanityForCutStock;
                    for($i = 0; $i < count($iProductId); $i++) {
                        $productIngredients[] = [
                            'product_id' => $product->id,
                            'ingredient_product_id' => $iProductId[$i],
                            'unit_id' => $iUnitId[$i],
                            'quanity_for_cut_stock' => $iQuanityForCutStock[$i],
                            'created_by' => Auth::id(),
                        ];
                    }
                    ProductIngredient::insert($productIngredients);
                }
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

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        return view('cms.product.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' =>  [
                'required',
                'max:255',
                Rule::unique('products')->ignore($id),
            ],
            'stockType' => 'required',
            'categoryId' => 'required',
            'unitId' => 'required',
            'price' => 'required',
            'quanityForCutStock' => 'required'

        ]);
        
        if($request->stockType == 'ingredient') {
            $request->validate([
                'iProductId' => 'required|min:1',
                'iUnitId' => 'required|min:1',
                'iQuanityForCutStock' => 'required|min:1',
    
            ]);
        }
        
        try 
        {   
            DB::transaction(function () use($request, $id) {
                $product = Product::findOrFail($id);
                $stockType = $request->stockType;
                $isIngredient = isset($request->isIngredient) ? 1 : 0;
                if($request->hasFile('photo')) {
                    $product->photo = FileHelper::updateImage($this->PATH, $request->photo, $product->photo);
                }
                $product->name = $request->name;
                $product->description = $request->description;
                $product->stock_type = $stockType;
                $product->is_ingredient = $isIngredient;
                $product->price = $request->price;
                $product->quanity_for_cut_stock = $request->quanityForCutStock;
                $product->unit_id = $request->unitId;
                $product->category_id = $request->categoryId;
                $product->updated_by = Auth::id();
                $product->save();
        
                ProductIngredient::where('product_id', $product->id)->forceDelete();
                
                if($stockType == 'ingredient') {
                    $productIngredients = [];
                    $iProductId = $request->iProductId;
                    $iUnitId = $request->iUnitId;
                    $iQuanityForCutStock = $request->iQuanityForCutStock;
                    for($i = 0; $i < count($iProductId); $i++) {
                        $productIngredients[] = [
                            'product_id' => $product->id,
                            'ingredient_product_id' => $iProductId[$i],
                            'unit_id' => $iUnitId[$i],
                            'quanity_for_cut_stock' => $iQuanityForCutStock[$i],
                            'created_by' => Auth::id(),
                        ];
                    }
                    ProductIngredient::insert($productIngredients);
                }
            });
            NotificationHelper::setSuccessNotification('updated_success');
            return redirect()->route('product');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return back()->withInput();
        }
        
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        try 
        {
            $product->deleted_at = date("Y-m-d H:i:s");
            $product->deleted_by = Auth::id();
            $product->save();

            NotificationHelper::setDeletedPopUp('deleted_success');
            return redirect()->route('product');
        } 
        catch (\Exception $e) 
        {
            NotificationHelper::errorNotification($e);
            return redirect()->route('product');
        }
    }
}
