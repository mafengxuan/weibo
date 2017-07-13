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

        $data = [];
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
        //
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
        //
    }
}
