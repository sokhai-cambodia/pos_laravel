<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{

    protected $table = 'inventory_transactions';

    protected $guarded = [];
    
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

}
