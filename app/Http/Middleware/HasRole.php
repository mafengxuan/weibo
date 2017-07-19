<?php

namespace App\Http\Middleware;

use App\Http\Model\Admin_permissions;
use App\Http\Model\Admin_roles;
use App\Http\Model\User_admin;
use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取当前请求的路由
        $route = \Route::current()->getActionName();
        //获取属于这个角色的权限
        $permission = Admin_roles::find(session('user')->role)->permissions()->get();
        //声明一个数组，存放所有的权限
        $arr = [];
        //把权限遍历出来 获取路由
        foreach($permission as $k => $v){
            $arr[]= $v['name'];
        }
        //判断当前路由是否在权限路由中
        if(!in_array($route,$arr)){
            return redirect('/back');
        }
        return $next($request);



    }
}


