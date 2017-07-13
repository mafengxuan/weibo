<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Admin_permissions;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * 权限管理
     * by:马凤轩
     *
     */
    public function index()
    {
//        $route =   \Route::current()->getActionName();
//        App\Http\Controllers\Admin\PermissionController@index

        $data = Admin_permissions::get();
        return view('admin.permission.index',compact('data'));
    }

    /**
     * 权限添加页面
     *
     *
     */
    public function create()
    {
        return view('admin.permission.addPermission');
    }

    /**
     * 执行添加
     *
     *
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        //验证规则
        $role = [
            'name' => 'required',
            'description' => 'required'
        ];
        //提示信息
        $mess = [
            'name.required' => '路由名必填',
            'description.required' => '权限描述必填',
        ];
        $validate = Validator::make($input,$role,$mess);

        if($validate->passes()){

            Admin_permissions::create($input);
            return back()->with('success','添加成功');
        }else{
            return back()->withErrors($validate);
        }


    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * 权限修改页面
     *
     *
     */
    public function edit($id)
    {
        $data = Admin_permissions::find($id);
        return view('admin.permission.editPermission',compact('data'));
    }

    /**
     * 执行权限修改
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     *权限删除
     *
     */
    public function destroy($id)
    {
        //删除对应id的权限
       $re = Admin_permissions::destroy($id);
//       $re = Admin_permissions::where('id',$id)->delete();


//       0表示成功 其他表示失败
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }
}
