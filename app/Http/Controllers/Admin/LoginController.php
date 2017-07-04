<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\User_admin;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require_once app_path().'/Org/code/Code.class.php';
use App\Org\code\Code;


class LoginController extends Controller
{
    /**
     * 返回后台登录页面
     * @param 参数
     * @return 返回值
     * @author 丁倩倩
     * @Date 2017-7-3 21:52
     */
    //加载登录页面
    public function login(){
        //显示登录页面
        return view('admin.login.login');
    }
    //验证码
    public function code()
    {
        $code = new Code();
       echo $code->make();
    }

    //处理登录
    public function dologin(Request $request)
    {
        //获取用户传递的数据
         $input = $request->except('_token');
         //验证规则
        $role = [
            'username' => 'required|between:5,18',
            'password' => 'required|between:6,18'
        ];
        //提示信息
        $mess = [
            'username.required' => '用户名必填',
            'username.between' => '用户名长度为5-18位',
            'password.required' => '密码必填',
            'password.between' => '密码长度为6-18位',
        ];
        $validate = Validator::make($input,$role,$mess);
        if($validate->passes()){
            //验证验证码
            if(strtoupper($input['code']) !=  session('code')){
                   return back()->with('errors','验证码错误')->withInput();
            }
            //获取用户名
            $user = User_admin::where('username',$input['username'])->first();
            //验证用户名
            if(!$user){
                return back()->with('errors','该用户不存在')->withInput();
            }
            //验证密码
            if($input['password']  != $user['password']){
                return back()->with('errors','密码错误')->withInput();
            }
            //登录成功跳到首页
            return redirect('admin/index/index');
        }else{
            return back()->withErrors($validate);
        }
        //将用户信息添加到session中
        session(['user'=>$user]);

    }


}
