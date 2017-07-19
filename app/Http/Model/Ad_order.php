<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ad_order extends Model
{
    //
    protected $table = 'ad_orders';
    protected $primaryKey = 'oid';
    protected $guarded = [];
    public $timestamps = false;
}
