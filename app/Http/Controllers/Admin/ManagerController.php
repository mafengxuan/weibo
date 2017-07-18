<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Admin_roles;
use App\Http\Model\User_admin;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //判断是否有关键字
        if($request->has('keywords')){
            //去掉二边的空格
            $key = trim($request->input('keywords')) ;
            //从表里查询含有关键字的数据
            $user = User_admin::join('admin_roles','user_admins.role','=','admin_roles.id')->where('username','like',"%".$key."%")->paginate(2);
            return view('admin.manager.index',['data'=>$user,'key'=>$key]);
        }else {
            //查询用户的所有数据  当二个id一样时给id起别名
            $user = User_admin::select('*','admin_roles.id as rid','user_admins.id as aid')->join('admin_roles','admin_roles.id','=','user_admins.role')->paginate(3);
            return view('admin.manager.index', ['data' => $user]);
        }
    }

    /**
     *  显示添加管理员页面
     */
    public function create()
    {
        //获取角色
        $name = DB::table('admin_roles')->get();
        return view('admin.manager.add',['name'=>$name]);
    }

    /**
     *  处理管理员添加
     */
    public function store(Request $request)
    {
        $input = Input::except('_token','name');
        $role =[
            'username'=>'required|between:3,18',
            'password'=>'required|between:5,18',
            'password_c'=>'same:password'
        ];
//       提示信息
        $mess=[
            'username.required'=>'必须输入用户名',
            'username.between'=>'用户名长度必须在3-18位之间',
            'password.required'=>'必须输入密码',
            'password.between'=>'密码长度必须在5-18位之间',
            'password_c.same'=>'确认密码必须与密码一致'
        ];
//       表单验证
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
            $input = Input::except('password_c','name');
            $input['login_time'] = time();
            $input['ctime'] = time();
            $name = Input::only('name');
            $input['role'] = $name['name'];
//            dd($input);
            $res = User_admin::create($input);
            if($res){
                return redirect('admin/manager');
            }else{
                return back()->with('error','添加失败');
            }
        }else{
            return back()->withErrors($v)->withInput();
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过传过来的id获取当前修改用户的信息
        $data = User_admin::where('id',$id)->first();
        //传给修改页面
        return view('admin.manager.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //修改对应id的用户
        $input = $request->only('password');
        $res =  User_admin::where('id',$id)->update($input);
        // 0表示成功 其他表示失败
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'重置成功！'
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'重置失败！'
            ];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除对应id的用户
        $re =  User_admin::where('id',$id)->delete();
        // 0表示成功 其他表示失败
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
