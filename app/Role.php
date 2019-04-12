<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $table = 'roles';
    protected $guarded = [];

    /**
     * Define Relationship
     */

    // User
    
    public function users()
    {
        return $this->hasMany('App\User');
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

    // Permission

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'role_permissions', 'role_id', 'permission_id');
    }

    // Data Table Customize Method

    public static function laratablesCustomAction($role)
    {
        return view('cms.role.data-table.action', compact('role'))->render();
    }

    public static function laratablesCustomListPermission($role)
    {
        return view('cms.role.data-table.list-permission', compact('role'))->render();
    }
}
