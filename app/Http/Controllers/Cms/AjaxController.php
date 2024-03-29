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
use App\Room;

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

    public function findUserInfo(Request $request) {
        $user = User::find($request->user_id);
        if($user == null) return response()->json([ 'status' => 0 ]);
        $id = $user->id;
        $branches = DB::table('branches as b')
                        ->leftJoin('branch_users as bu', function ($join) use ( $id) {
                            $join->on('bu.branch_id', '=', 'b.id')
                                 ->where('bu.user_id', '=', $id);
                        })
                        ->select('b.*', DB::raw('IF(bu.branch_id = b.id, true, false) as checked'))
                        ->get();

        $data = view('cms.ajax.user-info')->with([
            'user' => $user,
            'branches' => $branches,
            ])->render();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);

    }

    public function findProductIngredient(Request $request)
    {
        $products = Product::where('is_ingredient', 1)
                            ->where('name', 'like', '%'.$request->search.'%')
                            ->limit(10)
                            ->get();
        $response = array();
        foreach($products as $product) {
            $response[] = ["value" => $product->id, "label" => $product->name];
        }
        return response()->json($response);

    }

    public function findProductIngredientById(Request $request)
    {
        $product = Product::where('is_ingredient', 1)
                            ->where('id', $request->id)
                            ->first();

        if($product == null) return response()->json([ 'status' => 0 ]);

        $units = Unit::all();
        
        $tr = view('cms.ajax.product-ingredient')
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

    public function findUpdateProductIngredientById(Request $request)
    {
        $products = DB::table('products')
                    ->join('product_ingredients', 'product_ingredients.ingredient_product_id', '=', 'products.id')
                    ->where('product_ingredients.product_id', $request->id)
                    ->select(
                        'products.id',
                        'products.name',
                        'products.photo',
                        'product_ingredients.unit_id',
                        'product_ingredients.quantity_for_cut_stock'
                        )
                    ->get();

        if($products == null) return response()->json([ 'status' => 0 ]);

        $units = Unit::all();
        
        $tr = view('cms.ajax.update-product-ingredient')
              ->with([
                  'products' => $products,
                  'units' => $units
                ])
              ->render();
        return response()->json([
            'status' => 1,
            'tr' => $tr,
        ]);

    }
    
    
}
