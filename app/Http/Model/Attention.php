<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    //
    protected $table = 'attentions';

    public $timestamps = false;
    protected $guarded = [];
}
