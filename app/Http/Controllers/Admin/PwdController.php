<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\User_admin;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class PwdController extends Controller
{
    //修改密码视图
    public function repass()
    {
        return view('admin.pass.pass');
    }

    public function dorepass(Request $request)
    {
        //接收提交的数据
        $input = $request->except('_token');
        $role = [
            'password'=>'required|between:6,18',
            'password_c'=>'same:password',
        ];
        $mess = [
            'password.required'=>'必须输入新密码',
            'password.between'=>'新密码必须在6-18位之间',
            'password_c.same'=>'确认密码必须跟新密码一致'
        ];
        if($input['password_c'] != $input['password'])
        {
            return back()->with('errors','确认密码必须跟新密码一致');
        }
        $v = Validator::make($input,$role,$mess);
        if($v->passes()){
            //输入的原密码跟数据库中的密码是否一致

            $user =  User_admin::where('id',session('user')->id)->first();

            if($input['password_o'] != Crypt::decrypt($user->password)){
                return back()->with('errors','输入的原密码跟数据库中的密码不一致');
            }else{
                $pass = Crypt::encrypt($input['password']);
                $res =  $user->update(['password'=>$pass]);
                if($res){
                    //更新密码
                    $content = '修改密码: '.$user['username'];
                    Admin_log::dolog($content);

                    return redirect('admin/manager');
                }else{
                    return back()->with('errors','密码修改失败');
                }
            }

        }else{
            return back()->withErrors($v);
        }
    }
}
