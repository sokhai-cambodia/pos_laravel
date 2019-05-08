<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceIngredientDetail extends Model
{

    public $timestamps = false;
    protected $table = 'invoice_ingredient_details';

    protected $guarded = [];
    
}
