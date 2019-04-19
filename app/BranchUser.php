<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchUser extends Model
{

    protected $table = 'branch_users';

    protected $guarded = [];

    // User
    public function users()
    {
        return $this->belongsToMany('App\User', 'branch_users', 'branch_id', 'user_id');
    }
   
   

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
}
