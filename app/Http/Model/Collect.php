<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model
{
    //
    protected $table = 'collects';
    protected $primaryKey = 'cid';
    public $timestamps = false;
    protected $guarded = [];
}
