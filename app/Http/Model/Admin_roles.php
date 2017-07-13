<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_roles extends Model
{
    protected $table = 'admin_roles';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
