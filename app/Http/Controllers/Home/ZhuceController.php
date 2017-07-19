<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\HttpController;
use App\Http\Model\User_common;
use App\Http\Model\User_info;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ZhuceController extends Controller
{
    /**
     * 显示注册页面
     */
    public function getAdd()
    {
        return view('home.zhuce.add');
    }

    /**
     * 处理注册
     */
    public function postInsert(Request $request)
    {
        //接收验证码
        $phone_code = $request -> input('phone_code');

        //判断验证码
        if($phone_code != session('phone_code')){
            return redirect('/home/zhuce/add')->with('error','验证码错误') -> withInput();
        }

        //接收数据
        $data = $request -> except('_token','repassword','phone_code');
        //查找手机号是否存在
        $phone = DB::table('users') -> where('phone',$data['phone']) -> get();
        //判断手机号是否存在
        if($phone){
            return redirect('/home/zhuce/add')->with('phone','手机号已存在') -> withInput();
        }

        //密码加密
        $data['password'] = Crypt::encrypt($data['password']);

        //执行保存
        $uid = DB::table('users')->insertGetId($data);
        $arr['uid']=$uid;
        //注册时间以时间戳的形式存进去
        $arr['rtime']=time();
        $arr2['uid'] = $uid;
       $user =  User_info::create($arr);
        $user2 = User_common::create($arr2);
        //判断是否成功
        if($uid){
            return redirect('/home/login/login')->with('assuc','注册成功');
        }else{
            return redirect('/home/zhuce/add')->with('error','注册失败') -> withInput();
        }
   }

    /**
     * 使用ajax验证手机号是否存在
     */
    public function postTel($tel)
    {
        //进行用户查询 手机号
        $res = DB::table('users')->where('phone',$tel)->first();
        //判断手机号是否存在
        if ($res) {
            echo 1;
        } else {
            echo 2;
        }
    }

    /**
     *使用ajax获取验证码
     */
    public function getPhone(Request $request)
    {
        $phone = $request -> input('phone');
//        echo $phone;
        $res = self::phoneto($phone);
        echo $res;
    }
    /**
     * 手机验证码生成
     */
    public static function phoneto($phone)
    {
        $phone_code = rand(1000,9999);
        //验证码存在session中
        session(['phone_code'=>$phone_code]);
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C65973580&password=c553fdccf80d4f1d872a6c328e026a50&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        $res = HttpController::get($str);
        return $res;
    }
}

