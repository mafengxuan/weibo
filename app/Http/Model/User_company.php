<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{
    //
    protected $table = 'user_company';
    protected $primaryKey = 'company_id';
    public $timestamps = false;
}
