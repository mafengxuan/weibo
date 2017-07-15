<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_company extends Model
{
    //
    protected $table = 'user_companys';
    protected $primaryKey = 'company_id';
    protected $guarded = [];
    public $timestamps = false;
}
