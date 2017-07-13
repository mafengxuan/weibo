<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_info;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     *  处理图片上传
     */
    public function upload()
    {
        //将上传文件移动到指定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

            //将图片上传到本地服务器
            $path = $file->move(public_path() . '/uploads', $newName);

        //返回文件的上传路径
            $filepath = 'uploads/' . $newName;
            return $filepath;
        }
    }
    /**
     *  显示个人中心页面
     */
    public function index()
    {

        return view('home.user.user');
    }

    /**
     *  显示个人信息页面
     */
    public function info()
    {
        //查询登录者的信息
        $user = DB::table('users')
            ->join('user_infos','users.uid','=','user_infos.uid')->where('phone',session('user_home')->phone)
            ->first();
        //把信息传给前台模板
        return view('home.user.userinfos',['user'=>$user]);
    }

    /**
     *  显示个人信息修改页面
     */
    public function edit(Request $request)
    {
        $uid = session('user_home')->uid;
        $user = User_info::where('uid',$uid)->first();
        return view('home.user.user',['data'=>$user]);
    }

    /**
     *  处理修改信息
     */
    public function doedit(Request $request)
    {
        //接收用户的信息
        $input = $request->except('_token');
        //注册时间以时间戳的形式存进去
        $input['rtime'] = time();
        $uid = session('user_home')->uid;
        //执行修改
        $user = User_info::where('uid',$uid)->first();
        $res =$user->update($input);
        //判断修改是否成功
        if($res)
        {
            return redirect('home/index');
        }else{
            return redirect('home/edit')->with('error','修改失败');
        }
    }
}


