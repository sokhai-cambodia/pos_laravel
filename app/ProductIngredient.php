<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductIngredient extends Model
{
    use SoftDeletes;

    protected $table = 'product_ingredients';

    protected $guarded = [];

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

    // Product

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function productAsIngredient()
    {
        return $this->belongsTo('App\Product', 'ingredient_product_id');
    }

    // Unit

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

}
