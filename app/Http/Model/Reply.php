<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = 'replys';
    protected $primaryKey = 'rid';
    public $timestamps = false;
    protected $guarded = [];
}
