<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;
    
    protected $table = 'invoices';
    protected $guarded = [];

    /**
     * Define Relationship
     */

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
        return $this->belongsToMany('App\Product', 'invoice_details', 'invoice_id', 'product_id');
    }

    // Room
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
