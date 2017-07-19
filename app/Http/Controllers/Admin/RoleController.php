<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\Admin_permissions;
use App\Http\Model\Admin_roles;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * 角色管理
     * by:马凤轩
     *
     */
    public function index()
    {
        $data = Admin_roles::get();

        return view('admin.role.index',compact('data'));
    }

    /**
     * 添加角色
     *
     */
    public function create()
    {
       $data = (new Admin_roles)->tree();

//       dd($data);
        return view('admin.role.add',compact('data'));
    }

    /**
     * 执行添加
     *
     */
    public function store(Request $request)
    {
        $input = $request -> except('_token','idall');

        $role['name']=$input['name'];
        $role['description']=$input['description'];
        $rid = Admin_roles::insertGetId($role);
        foreach($input['id'] as $k => $v)
        {
            \DB::insert('insert into admin_permission_role (permission_id, role_id) values (?, ?)', [  $v,$rid]);
        }
        $content = '添加角色: '.$input['name'];
        Admin_log::dolog($content);

        $data ['msg'] = '添加成功';
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 角色编辑页面
     *
     *
     *
     */
    public function edit($id)
    {
        $info = Admin_roles::find($id);
        $res = \DB::table('admin_permission_role')->where('role_id',$id)->select('permission_id')->get();
        $ids = [];
        foreach($res as $k => $v){
            $ids[]=$v['permission_id'];
        }
        $data = (new Admin_roles)->tree();
        return view('admin.role.edit',compact('data','info','ids'));
    }

    /**
     * 执行修改
     *
     *
     */
    public function update(Request $request, $id)
    {
        //根据id获取修改记录
        $role = Admin_roles::find($id);
        //根据请求传过来的参数获取到要修改成的记录
        $input['name'] = $request->input('name');
        $input['description'] = $request->input('description');


        //更新
        $role->update($input);
        \DB::table('admin_permission_role')->where('role_id',$id)->delete();

        foreach($request->input('id') as $k => $v)
        {
            \DB::insert('insert into admin_permission_role (permission_id, role_id) values (?, ?)', [  $v,$id]);
        }
        $content = '修改角色: 编号'.$id;
        Admin_log::dolog($content);
        $data ['msg'] = '修改成功';
        return $data;
    }

    /**
     * 角色删除
     *
     *
     *
     */
    public function destroy($id)
    {
        //删除对应id的权限
        $re = Admin_roles::destroy($id);
//       0表示成功 其他表示失败
        if($re){
            $content = '删除角色: 编号'.$id;
            Admin_log::dolog($content);
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
