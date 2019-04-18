<?php
namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Role;
use App\Permission;
use App\Product;
use App\Unit;
use App\User;

class AjaxController extends Controller
{
    public function findPermission(Request $request)
    {
        $permissions = Permission::where('use_for_action', '!=', '1')
                                ->whereNotNull('permission_id')
                                ->where('permission_id', $request->id)
                                ->get();

        if($permissions == null) return response()->json(['status' => 0]);
        
        $data = '';
        foreach($permissions as $permission)
        {
            $data .= "<div class='form-check form-check-flat form-check-primary'>
                            <label class='form-check-label'>
                                <input type='checkbox' class='form-check-input' value='$permission->id' name='permissions[]'>
                                    $permission->name
                                <i class='input-helper'></i>
                            </label>
                        </div>";
        }

        return response()->json([
            'status' => 1,
            'data' => $data
        ]);

    }

    public function findProductIngredient(Request $request)
    {
        $products = Product::where('is_ingredient', 1)->get();
        $units = Unit::all();
        $productIngredientList = view('cms.ajax.product.product-ingredient-list')
                                ->with([
                                    'products' => $products,
                                    'units' => $units,
                                ])
                                ->render();
        $table = view('cms.ajax.product.product-ingredient')->with(['productIngredientList' => $productIngredientList])->render();
        $data = [
            'table' => $table,
            'row' => $productIngredientList
        ];
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);

    }

    public function findUpdateProductIngredient(Request $request)
    {
        $products = Product::where('is_ingredient', 1)->get();
        $units = Unit::all();
        $productsData = DB::table('products')
                        ->join('product_ingredients', 'product_ingredients.ingredient_product_id', '=', 'products.id')
                        ->where('product_ingredients.product_id', $request->id)
                        ->select(
                            'products.id',
                            'products.photo',
                            'product_ingredients.unit_id',
                            'product_ingredients.quanity_for_cut_stock'
                            )
                        ->get();

        $productIngredientLists = view('cms.ajax.product.product-ingredient-update-list')
                                ->with([
                                    'productsData' => $productsData,
                                    'products' => $products,
                                    'units' => $units,
                                ])
                                ->render();

        $productIngredientList = view('cms.ajax.product.product-ingredient-list')
                                ->with([
                                    'products' => $products,
                                    'units' => $units,
                                ])
                                ->render();
        $table = view('cms.ajax.product.product-ingredient')->with(['productIngredientList' => $productIngredientLists])->render();
        $data = [
            'table' => $table,
            'row' => $productIngredientList,
        ];
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);

    }


    public function findUserInfo(Request $request) {
        $user = User::find($request->user_id);
        if($user == null) {
            return response()->json([ 'status' => 0 ]);
        }

        $data = view('cms.ajax.user-info')->with(['user' => $user])->render();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);

    }

    
    
}
