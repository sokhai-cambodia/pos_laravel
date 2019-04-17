<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use FileHelper;

class User extends Authenticatable
{

    
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    protected $guarded = [];
    private $PATH = 'assets/uploads/profile';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Define Relationship
     */

    // Role
    
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function rolesCreatedBy()
    {
        return $this->hasMany('App\Role', 'created_by');
    }

    public function rolesUpdatedBy()
    {
        return $this->hasMany('App\Role', 'updated_by');
    }

    public function rolesDeletedBy()
    {
        return $this->hasMany('App\Role', 'deleted_by');
    }

    // Permission

    public function permissionsCreatedBy()
    {
        return $this->hasMany('App\Permission', 'created_by');
    }

    public function permissionsUpdatedBy()
    {
        return $this->hasMany('App\Permission', 'updated_by');
    }

    public function permissionsDeletedBy()
    {
        return $this->hasMany('App\Permission', 'deleted_by');
    }

    // Branch And User

    public function branchUsersCreatedBy()
    {
        return $this->hasMany('App\BranchUser', 'created_by');
    }

    public function branchUsersUpdatedBy()
    {
        return $this->hasMany('App\BranchUser', 'updated_by');
    }

    public function branchUsersDeletedBy()
    {
        return $this->hasMany('App\BranchUser', 'deleted_by');
    }

    // Branch

    public function branches()
    {
        return $this->belongsToMany('App\Branch', 'branch_users', 'user_id', 'branch_id');
    }

    public function branchesCreatedBy()
    {
        return $this->hasMany('App\Branch', 'created_by');
    }

    public function branchesUpdatedBy()
    {
        return $this->hasMany('App\Branch', 'updated_by');
    }

    public function branchesDeletedBy()
    {
        return $this->hasMany('App\Branch', 'deleted_by');
    }

    // Room

    public function roomsCreatedBy()
    {
        return $this->hasMany('App\Room', 'created_by');
    }

    public function roomsUpdatedBy()
    {
        return $this->hasMany('App\Room', 'updated_by');
    }

    public function roomsDeletedBy()
    {
        return $this->hasMany('App\Room', 'deleted_by');
    }

    // Category

    public function categoriesCreatedBy()
    {
        return $this->hasMany('App\Category', 'created_by');
    }

    public function categoriesUpdatedBy()
    {
        return $this->hasMany('App\Category', 'updated_by');
    }

    public function categoriesDeletedBy()
    {
        return $this->hasMany('App\Category', 'deleted_by');
    }

    // Product

    public function productsCreatedBy()
    {
        return $this->hasMany('App\Product', 'created_by');
    }

    public function productsUpdatedBy()
    {
        return $this->hasMany('App\Product', 'updated_by');
    }

    public function productsDeletedBy()
    {
        return $this->hasMany('App\Product', 'deleted_by');
    }

    // Unit

    public function unitsCreatedBy()
    {
        return $this->hasMany('App\Unit', 'created_by');
    }

    public function unitsUpdatedBy()
    {
        return $this->hasMany('App\Unit', 'updated_by');
    }

    public function unitsDeletedBy()
    {
        return $this->hasMany('App\Unit', 'deleted_by');
    }

    // Product Ingredient

    public function productIngredientsCreatedBy()
    {
        return $this->hasMany('App\ProductIngredient', 'created_by');
    }

    public function productIngredientsUpdatedBy()
    {
        return $this->hasMany('App\ProductIngredient', 'updated_by');
    }

    public function productIngredientsDeletedBy()
    {
        return $this->hasMany('App\ProductIngredient', 'deleted_by');
    }

    // Data Table Customize Method
    public function getPhoto()
    {
        return asset(FileHelper::getDefaultPathName().'/'.$this->photo);
    }

    public static function laratablesAdditionalColumns()
    {
        return ['photo', 'first_name', 'last_name'];
    }

    public static function laratablesCustomAction($user)
    {
        return view('cms.user.data-table.action', compact('user'))->render();
    }

    public static function laratablesCustomThumbnail($user)
    {
        return view('cms.user.data-table.photo', compact('user'))->render();
    }

    public static function laratablesCustomName($user)
    {
        return $user->last_name.' '.$user->first_name;
    }

    public static function laratablesSearchName($query, $searchValue)
    {
        return $query->orWhere(DB::raw("CONCAT(`last_name`, ' ', `first_name`)"), 'like', '%'. $searchValue. '%');
    }

    public static function laratablesOrderRawName($direction)
    {
        return 'last_name '.$direction.', first_name '.$direction;
    }

}
