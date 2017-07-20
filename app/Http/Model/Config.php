<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $table = 'configs';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['conf_title','conf_name','conf_content','field_value','field_type','conf_tip'];

}
