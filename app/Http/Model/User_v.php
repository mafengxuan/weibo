<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_v extends Model
{
    //
    protected $table = 'user_vs';
    protected $primaryKey = 'v_id';
    protected $guarded = [];
    public $timestamps = false;
}
