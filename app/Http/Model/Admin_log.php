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


    public static function dolog($content){
        $arr = [];
        $arr['username'] = session('user')->username;
        $arr['ctime'] = time();
        $arr['content'] = $content;
        $arr['ip'] = ip2long($_SERVER["REMOTE_ADDR"]);
        Admin_log::create($arr);
    }
}
