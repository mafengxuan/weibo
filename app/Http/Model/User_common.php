<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_common extends Model
{
    //
    protected $table = 'user_commons';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $guarded = [];
}
