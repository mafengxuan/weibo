<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    protected $table = 'profits';
    protected $primaryKey = 'fid';
    protected $guarded = [];
    public $timestamps = false;
}
