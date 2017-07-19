<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
    protected $primaryKey = 'aid';
    protected $guarded = [];
    public $timestamps = false;
}
