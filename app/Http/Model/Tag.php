<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';
    protected $primaryKey = 'tid';
    protected $guarded = [];
    public $timestamps = false;
}
