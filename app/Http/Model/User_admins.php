<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_admins extends Model
{
    protected $table = 'user_admins';
    protected $fillable = ['username','password','login_time','ctime'];
    public $timestamps = false;
}
