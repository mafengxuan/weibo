<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PwdController extends Controller
{
    //修改密码视图
    public function repass()
    {
        return view('home.pass.pass');
    }

    //处理修改
    public function dorepass(Request $request)
    {
        //接收提交的数据
        $input = $request->except('_token');

        //验证规则
        $role = [
            'password'=>'required|between:6,18',
            'password_c'=>'required|between:6,18',
            'password_c'=>'same:password',
        ];

        //提示信息
        $mess = [
            'password.required'=>'必须输入新密码',
            'password_c.required'=>'必须输入确认密码',
            'password.between'=>'新密码必须在6-18位之间',
            'password_c.same'=>'确认密码必须跟新密码一致'
        ];
        if($input['password_c'] != $input['password'])
        {
            return back()->with('errors','确认密码必须跟新密码一致');
        }
        $v = Validator::make($input,$role,$mess);
        //判断
        if($v->passes()){
           //取该用户的数据
            $user =  User::where('uid',session('user_home')->uid)->first();
//            dd($user['password']);

            //判断输入的原密码跟数据库中的密码是否一致 Crypt::decrypt($encryptedString);
            if($input['password_o'] != Crypt::decrypt($user['password'])){
                return back()->with('errors','原密码输入错误');
            }else{
                $pass = Crypt::encrypt($input['password']);  //密码加密
                $res =  $user->update(['password'=>$pass]);
                if($res)
                {
                    //更新密码
                    return redirect('home/index');
                }else {
                    return back()->with('errors','密码修改失败');
                }
            }
        }else{
            return back()->withErrors($v);
        }
    }
}

