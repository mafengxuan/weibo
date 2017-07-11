<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ad_position extends Model
{
    //
    protected $table = 'ad_positions';
    protected $primaryKey = 'pid';
    protected $guarded = [];
    public $timestamps = false;
}
