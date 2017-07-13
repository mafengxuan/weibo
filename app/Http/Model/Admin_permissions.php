<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_permissions extends Model
{
    protected $table = 'admin_permissions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
