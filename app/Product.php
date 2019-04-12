<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $guarded = [];

    private $PATH = 'assets/uploads/products';

    // User
   
    public function userCreatedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function userUpdatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function userDeletedBy()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

    // Category

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Unit

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    // Product Ingredient

    public function productIngredients()
    {
        return $this->hasMany('App\ProductIngredient');
    }

    public function productAsIngredients()
    {
        return $this->hasMany('App\ProductIngredient', 'ingredient_product_id');
    }

    // Invoice

    public function invoices()
    {
        return $this->belongsToMany('App\Invoice', 'invoice_details', 'product_id', 'invoice_id');
    }

    

    public function getPhoto()
    {
        return asset($this->PATH.'/'.$this->photo);
    }

    public static function laratablesAdditionalColumns()
    {
        return ['photo', 'category_id', 'unit_id', 'quanity_for_cut_stock', 'name'];
    }

    public static function laratablesCustomThumbnail($product)
    {
        return view('cms.product.data-table.photo', compact('product'))->render();
    }

    public static function laratablesCustomCategory($product)
    {   
        return $product->category->name;
    }

    public static function laratablesCustomStock($product)
    {
        return $product->quanity_for_cut_stock.' '.$product->unit->name;
    }

    public static function laratablesCustomIngredient($product)
    {
        $products = DB::table('products')
            ->join('product_ingredients', 'product_ingredients.ingredient_product_id', '=', 'products.id')
            ->where('product_ingredients.product_id', $product->id)
            ->select('products.*')
            ->get();
        return view('cms.product.data-table.list-product-ingredient', compact('products'))->render();
    }

    public static function laratablesCustomAction($product)
    {
        return view('cms.product.data-table.action', compact('product'))->render();
    }
 

}
