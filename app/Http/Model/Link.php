<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $table = 'links';
    protected $primaryKey = 'lid';
    public $timestamps = false;
}
