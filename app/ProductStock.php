<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{

    public $timestamps = false;
    protected $table = 'product_stocks';

    protected $guarded = [];
    
}
