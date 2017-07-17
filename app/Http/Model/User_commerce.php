<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_commerce extends Model
{
    //
    protected $table = 'user_commerces';
    protected $primaryKey = 'commerce_id';
    protected $guarded = [];
    public $timestamps = false;
}
