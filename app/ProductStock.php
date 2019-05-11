<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class ProductStock extends Model
{

    public $timestamps = false;
    protected $table = 'product_stocks';

    protected $guarded = [];

    public static function cutStock($branchId, $productId, $qty) {
        // Find exist product and branch
        $stock = ProductStock::where('branch_id',  $branchId)
                    ->where('product_id', $productId)
                    ->first();
        if($stock == null) return false;

        // update stock
        
        $qty = $stock->qty - $qty;
        ProductStock::where('branch_id',  $branchId)
        ->where('product_id', $productId)
        ->update(['qty' => $qty]);
        return true;
    }
    
}
