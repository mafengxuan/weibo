<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_roles extends Model
{
    protected $table = 'admin_roles';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function tree(){
        $arr = [];
        $data = Admin_permissions::where('pid',0)->get();
        foreach($data as $k => $v){
           $re = Admin_permissions::where('pid',$v->id)->get();
           $arr[$k]['id']=$v->id;
           $arr[$k]['description']=$v->description;
           $arr[$k]['son']=$re->toArray();
        }

        return $arr;
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Http\Model\Admin_permissions','admin_permission_role','role_id', 'permission_id');
    }
}
