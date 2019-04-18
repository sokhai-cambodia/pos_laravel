<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    protected $table = 'rooms';

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

    // Branch

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    // Invoice

    public function rooms()
    {
        return $this->belongsTo('App\Room');
    }

    // Data Table Customize Method

    public static function laratablesCustomAction($room)
    {
        return view('cms.room.data-table.action', compact('room'))->render();
    }

}
