<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User;
use App\Http\Model\User_common;
use App\Http\Model\User_info;
use App\Services\OSS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends CommonController
{



        /**
     *  显示个人信息页面
     */
    public function info()
    {

        //获取出用户详情表的信息
        $user = DB::table('users')
                ->join('user_infos','users.uid','=','user_infos.uid')
                ->where('phone',session('user_home')->phone)->first();
        //获取头像表的信息
        $user3 = DB::table('users')->join('user_commons','users.uid','=','user_commons.uid')
                 ->where('phone',session('user_home')->phone)
                 ->first();
        //获取邮箱信息
        $uid = session('user_home')->uid;
        $email = User::where('uid',$uid)->first()['email'];
        //把消息传给前台模板
        return view('home.user.userinfos',['user'=>$user,'user3'=>$user3,'email'=>$email]);
    }

    /**
     *  显示个人信息修改页面
     */
    public function edit(Request $request)
    {
        $uid = session('user_home')->uid;
        //获取用户详情
        $user = User_info::where('uid',$uid)->first();
        //获取头像
        $user2 = User_common::where('uid',$uid)->first();
        //获取邮箱
        $email = User::where('uid',$uid)->first()['email'];
        return view('home.user.user',['data'=>$user,'user2'=>$user2,'email'=>$email]);
    }

    /**
     *  处理修改信息
     */
    public function doedit(Request $request)
    {
        //接收用户的信息 user_infos
        $input = $request->except('_token','file_upload','face','nickname','email');

        //接收用户头像的信息  user_commons
        $data = $request->only('nickname','face');
        //接收用户邮箱的信息  users
        $email = $request->only('email');

        //获取登录者的uid
        $uid = session('user_home')->uid;
        $input['birth'] = strtotime($input['birth']);
        //执行修改
        $res = User_info::where('uid',$uid)->update($input);
        $res2 = User_common::where('uid',$uid)->update($data);
        $res3 = User::where('uid',$uid)->update($email);

        //判断修改是否成功
        if($res || $res2 || $res3)
        {
            //将图像信息存到session中
           session(['photo'=>$data]);
            return redirect('home/info');

        }else{
            return redirect('home/edit')->with('error','修改失败');
        }
    }

    /**
     *  显示激活邮箱页面
     */
    public function email()
    {
        //获取邮箱
        $uid = session('user_home')->uid;
        return view('home.user.email');
    }

    /**
     *  处理邮箱
     */
    public function doemail(Request $request)
    {
        // 1. 接收用户的邮箱数据
        $data = $request->except('_token');
        $uid = session('user_home')->uid;
        //获取邮箱状态
        $status = User::where('uid',$uid)->first()['status'];
        //获取邮箱
        $email = User::where('uid',$uid)->first()['email'];
        //判断用户输入的邮箱和数据库的是否一致
        if($data['email'] != $email)
        {
            return back()->with('errors','请填写个人中心中的邮箱');
        }
        //判断邮箱状态是否激活
        if($status == 2){
            return back()->with('errors','邮箱已经激活');
        }
        // 2.发送邮件
        // 给谁发  注册邮箱号 uid
        if ($uid) {
            self::mailto($data['email'], $uid);
        }
        return view('home.user.tishi');
    }

    /**
     *  判断是否激活成功,修改状态
     */
        public function Jihuo(Request $request){
        $uid =  $request -> all();
        $res = User::where('uid',$uid)->update(['status'=>2]);
            if($res){
                return redirect('home/index');
            }else{
                echo '激活失败';
            }
    }
    /**
     *  激活邮箱调用的方法
     */
        public static function mailto($email,$uid){
            //发送的模板  uid  email  发送消息
             Mail::send('home.mail.index', ['uid' => $uid,'email'=>$email], function ($m) use ($email) {
             $m->to($email)->subject('这是一封注册邮件');
    });

}

}


