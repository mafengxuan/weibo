<?php

namespace App\Http\Model\Admin\Microblog;

use Illuminate\Database\Eloquent\Model;

class Microblog extends Model
{
    protected $table = 'microblogs';
    protected $primaryKey = 'mid';
//    protected $fillable = ['uid','nid','tid','status','content','ctime','c_count','t_count','p_count'];
//    public $timestamps = false;
}
