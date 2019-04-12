<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $guarded = [];

    private $PATH = 'assets/uploads/categories';
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
        return $this->hasMany('App\Product');
    }

    // Data Table Customize Method

    public function getPhoto()
    {
        return asset($this->PATH.'/'.$this->photo);
    }

    public static function laratablesAdditionalColumns()
    {
        return ['photo'];
    }

    public static function laratablesCustomAction($category)
    {
        return view('cms.category.data-table.action', compact('category'))->render();
    }

    public static function laratablesCustomThumbnail($category)
    {
        return view('cms.category.data-table.photo', compact('category'))->render();
    }

}
