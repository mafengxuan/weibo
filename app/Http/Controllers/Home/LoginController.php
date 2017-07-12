<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //加载登录页面
    public function login()
    {
        //显示登录页面
        return view('home.login.login');
    }

    //处理登录
    public function dologin(Request $request)
    {
        $input = $request->except('_token');
        //验证规则
        $role = [
            'phone' => 'required',
            'password' => 'required|between:6,18'
        ];
//       提示信息
        $mess = [
            'phone.required' => '用户名必填',
            'password.required' => '密码必填',
            'password.between' => '密码长度必须在6-18位之间'
        ];
//       表单验证
        $validator = Validator::make($input, $role, $mess);
        if ($validator->passes()) {
            //获取用户名
            $user = User::where('phone', $input['phone'])->first();
            //判断用户名
            if (!$user)
            {
                return back()->with('errors', '该用户不存在')->withInput();
            }
            //判断密码
//            dd(Crypt::encrypt('123456'));
           // dd(Crypt::encrypt('123456'));

//            dd($user->password);
//            dd(Crypt::decrypt($user->password));
            if ($input['password']  != Crypt::decrypt($user->password))
            {
                return back()->with('errors', '密码错误')->withInput();
            }

            //将用户信息添加到session中
            session(['user' => $user]);
            //登录
            return redirect('home/index');
        } else {
//          如果没有通过表单验证
            return back()->withErrors($validator);
        }
    }

    //退出
    public function quit()
    {
        //清空session
        session(['user'=>null]);
        return redirect('/home/login/login');
    }
}