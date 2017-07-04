<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Microblog extends Model
{
    //
    protected $table = 'microblogs';
    protected $primaryKey = 'mid';
    public $timestamps = false;
}
