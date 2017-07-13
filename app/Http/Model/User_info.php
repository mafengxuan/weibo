<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    //
    protected $table = 'user_infos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
