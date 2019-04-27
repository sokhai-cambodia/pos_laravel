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
    private $icon = 'icon-layers';
    private $stock_types = ['product', 'ingredient'];

    public function index()
    {
        $data = [
            'title' => 'List Product',
            'icon' => $this->icon
        ];
        return view('cms.product.index')->with($data);
    }

    public function getProductLists()
    {
        return Laratables::recordsOf(Product::class);
    }

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        $data = [
            'title' => 'Create New Product',
            'icon' => $this->icon,
            'stock_types' => $this->stock_types,
            'categories' => $categories,
            'units'  => $units,
        ];
        return view('cms.product.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'stock_type' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'quantity_for_cut_stock' => 'required'

        ]);
        
        if($request->stock_type == 'ingredient') {
            $request->validate([
                'i_product_id' => 'required|min:1',
                'i_unit_id' => 'required|min:1',
                'i_quantity_for_cut_stock' => 'required|min:1',
    
            ]);
        }
        
        try 
        {   
            DB::transaction(function () use($request) {
                $stock_type = $request->stock_type;
                $is_ingredient = isset($request->is_ingredient) ? 1 : 0;
                $photo = null;
                if($request->hasFile('photo')) {
                    $photo = FileHelper::upload($request->photo);
                }
                
                $product = Product::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'photo' => $photo,
                    'stock_type' => $stock_type,
                    'is_ingredient' => $is_ingredient,
                    'price' => $request->price,
                    'quantity_for_cut_stock' => $request->quantity_for_cut_stock,
                    'unit_id' => $request->unit_id,
                    'category_id' => $request->category_id,
                    'created_by' => Auth::id(),
                ]);

                if($stock_type == 'ingredient') {
                    $productIngredients = [];
                    $i_product_id = $request->i_product_id;
                    $i_unit_id = $request->i_unit_id;
                    $i_quantity_for_cut_stock = $request->i_quantity_for_cut_stock;
                    for($i = 0; $i < count($i_product_id); $i++) {
                        $productIngredients[] = [
                            'product_id' => $product->id,
                            'ingredient_product_id' => $i_product_id[$i],
                            'unit_id' => $i_unit_id[$i],
                            'quantity_for_cut_stock' => $i_quantity_for_cut_stock[$i],
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $units = Unit::all();
        $data = [
            'title' => 'Edit User',
            'icon' => $this->icon,
            'stock_types' => $this->stock_types,
            'product' => $product,
            'categories'  => $categories,
            'units'  => $units
        ];
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
            'stock_type' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'quantity_for_cut_stock' => 'required'

        ]);
        
        if($request->stock_type == 'ingredient') {
            $request->validate([
                'i_product_id' => 'required|min:1',
                'i_unit_id' => 'required|min:1',
                'i_quantity_for_cut_stock' => 'required|min:1',
    
            ]);
        }
        
        try 
        {   
            DB::transaction(function () use($request, $id) {
                $product = Product::findOrFail($id);
                $stock_type = $request->stock_type;
                $is_ingredient = isset($request->is_ingredient) ? 1 : 0;
                if($request->hasFile('photo')) {
                    $product->photo = FileHelper::updateImage($request->photo, $product->photo);
                }
                $product->name = $request->name;
                $product->description = $request->description;
                $product->stock_type = $stock_type;
                $product->is_ingredient = $is_ingredient;
                $product->price = $request->price;
                $product->quantity_for_cut_stock = $request->quantity_for_cut_stock;
                $product->unit_id = $request->unit_id;
                $product->category_id = $request->category_id;
                $product->updated_by = Auth::id();
                $product->save();
        
                ProductIngredient::where('product_id', $product->id)->forceDelete();
                
                if($stock_type == 'ingredient') {
                    $productIngredients = [];
                    $i_product_id = $request->i_product_id;
                    $i_unit_id = $request->i_unit_id;
                    $i_quantity_for_cut_stock = $request->i_quantity_for_cut_stock;
                    for($i = 0; $i < count($i_product_id); $i++) {
                        $productIngredients[] = [
                            'product_id' => $product->id,
                            'ingredient_product_id' => $i_product_id[$i],
                            'unit_id' => $i_unit_id[$i],
                            'quantity_for_cut_stock' => $i_quantity_for_cut_stock[$i],
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
