<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_permissions extends Model
{
    protected $table = 'admin_permissions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function tree(){
        //先排序
        $permissions = $this->orderBy('id','asc')->get();
        //添加缩进
        $res = $this->getTree($permissions);
        return $res;
    }
    public function getTree($permissions)
    {
        $arr = [];
        foreach($permissions as $k=>$v){
//            判断是否是一级类
            if($permissions[$k]->pid == 0){
                $permissions[$k]['_description'] =  $permissions[$k]->description;
                $arr[] = $permissions[$k];
//                找当前一级类下的二级类
                foreach ($permissions as $m=>$n){
//                    当前分类是正在遍历的一级类的子分类
                    if($v->id == $n->pid){
                        $permissions[$m]['_description'] = "|-|-".$permissions[$m]->description;
                        $arr[] = $permissions[$m];
                    }
                }
            }
        }

        return $arr;

    }


    public function role()
    {
        return $this->belongsToMany('App\Http\Model\Admin_roles','admin_permission_role', 'permission_id', 'role_id');
    }
}
