<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ad_blogroll extends Model
{
    //
    protected $table = 'ad_blogrolls';
    protected $primaryKey = 'bid';
    public $timestamps = false;
}
