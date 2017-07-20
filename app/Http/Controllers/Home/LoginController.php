<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\HttpController;
use App\Http\Model\User;
use App\Http\Model\User_common;
use App\Http\Model\User_info;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     *  加载登录页面
     */
    public function login()
    {
        //显示登录页面
        return view('home.login.login');
    }

    /**
     *  处理登录
     */
    public function dologin(Request $request)
    {
        //接收数据
        $input = $request->except('_token');

        //验证规则
        $role = [
            'phone' => 'required',
            'password' => 'required|between:6,18'
        ];
       //提示信息
        $mess = [
            'phone.required' => '用户名必填',
            'password.required' => '密码必填',
            'password.between' => '密码长度必须在6-18位之间'
        ];
       //表单验证
        $validator = Validator::make($input, $role, $mess);
        if ($validator->passes()) {

            //获取手机号
            $user = User::where('phone', $input['phone'])->first();

            //获取图像
            $photo = User_common::where('uid',$user['uid'])->first();

            //判断用户名
            if (!$user)
            {
                return back()->with('errors', '该用户不存在')->withInput();
            }
            //判断密码
            if ($input['password']  != Crypt::decrypt($user->password))
            {
                return back()->with('errors', '密码错误')->withInput();
            }
            //最后一次登录的时间戳
            $logintime['login_time'] = time();
            //执行插入
             User::where('uid',$user->uid)->update($logintime);

            //将用户信息添加到session中
            session(['user_home' => $user,'photo'=>$photo]);
            //登录
            return redirect('home/index');
        } else {
          //如果没有通过表单验证
            return back()->withErrors($validator);
        }
    }

    /**
     *  退出
     */
    public function quit()
    {
        //清空session
        session(['user_home'=>null]);
        return redirect('/home/index');
    }

    /**
     *  显示找回密码验证手机号的页面
     */
    public function getPhone()
    {
        return view('home.phone.phone');
    }
    /**
     *  处理验证的手机号
     */
    public function postInsert(Request $request)
    {
        //接收验证码
        $phone_code = $request -> input('phone_code');

        //判断验证码
        if($phone_code != session('phone_code')){
            return redirect('/home/phone/phone')->with('error','验证码错误');
        }

        //接收手机号
        $data = $request -> except('_token','phone_code');
        //查找数据库中的手机号是否存在
        $phone = DB::table('users') -> where('phone',$data['phone']) -> get();
        //判断手机号是否存在
        if(!$phone){
            return redirect('/home/phone/phone')->with('phone','手机号不存在');
        }
        session(['phone'=>$data]);
        return redirect('/home/phone/pwd');

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
    public function getCode(Request $request)
    {
        $phone = $request -> input('phone');
//        echo $phone;
        $res = self::codeto($phone);
        echo $res;
    }
    /**
     *手机验证码
     */
    public static function codeto($phone)
    {
        $phone_code = rand(1000,9999);
        //验证码存在session中
        session(['phone_code'=>$phone_code]);
        $str = 'http://106.ihuyi.com/webservice/sms.php?method=Submit&account=C65973580&password=c553fdccf80d4f1d872a6c328e026a50&format=json&mobile='.$phone.'&content=您的验证码是：'.$phone_code.'。请不要把验证码泄露给其他人。';
        $res = HttpController::get($str);
        return $res;
    }

    /**
     *  显示找回密码页面
     */
    public function getPwd()
    {
        return view('home.phone.pwd');
    }
    /**
     *  处理找回密码
     */
    public function postDopwd(Request $request)
    {
        //接收密码
        $input = $request->except('_token');
        //验证规则
        $role = [
            'password'=>'required|between:6,18',
            'password_c'=>'same:password'
        ];

        //提示信息
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
        //判断
        if($v->passes()){
            //获取手机号
            $phone = session('phone');
            //取该用户的数据
            $user =  User::where('phone',$phone)->first();
//            dd($user);
                $pass = Crypt::encrypt($input['password']);  //密码加密
                $res =  $user->update(['password'=>$pass]);
                if($res)
                {
                    //更新密码
                    return redirect('home/index');
                }else{
                    return back()->with('errors','密码修改失败');
                }
            }else{
            return back()->withErrors($v);
        }
    }

}