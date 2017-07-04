<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_common extends Model
{
    //
    protected $table = 'user_commoms';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
