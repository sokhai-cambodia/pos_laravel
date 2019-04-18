<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    
    protected $table = 'permissions';
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

    // Role

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_permissions', 'permission_id', 'role_id');
    }

    // Data Table Customize Method

    public static function laratablesCustomAction($permission)
    {
        return view('cms.permission.data-table.action', compact('permission'))->render();
    }

    public static function laratablesCustomUseForAction($permission)
    {
        return view('cms.permission.data-table.use-for-action', compact('permission'))->render();
    }

}
