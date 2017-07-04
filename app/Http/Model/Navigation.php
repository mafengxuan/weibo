<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //
    protected $table = 'navigations';
    protected $primaryKey = 'nid';
    public $timestamps = false;
}
