<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_log extends Model
{
    //
    protected $table = 'admin_logs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
