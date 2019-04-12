<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetail extends Model
{
    use SoftDeletes;

    protected $table = 'invoice_details';

    protected $guarded = [];

    // Unit

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

}
