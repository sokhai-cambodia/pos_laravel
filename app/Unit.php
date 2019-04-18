<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'units';

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

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    // Product Ingredient

    public function productIngredients()
    {
        return $this->hasMany('App\ProductIngredient');
    }

    // Invoice Detail

    public function invoiceDetails()
    {
        return $this->hasMany('App\InvoiceDetail');
    }

    // Data Table Customize Method

    public static function laratablesCustomAction($unit)
    {
        return view('cms.unit.data-table.action', compact('unit'))->render();
    }
}
