<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';

    protected $guarded = [];

    // User
    public function users()
    {
        return $this->belongsToMany('App\User', 'branch_users', 'branch_id', 'user_id');
    }

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

    // Room
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    // Data Table Customize Method

    public static function laratablesCustomAction($branch)
    {
        return view('cms.branch.data-table.action', compact('branch'))->render();
    }
}
