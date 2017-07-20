<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_admin extends Model
{
    //
    protected $table = 'user_admins';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

}
