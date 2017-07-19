<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Ad_position;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Services\OSS;

class AdaddController extends CommonController
{
    /*
     * 上传图片
     */
    public function upload()
    {
//        将上传文件移动到制定目录，并以新文件名命名
        $file = Input::file('file_upload');
        if($file->isValid()) {
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
//            将图片上传到本地服务器
//            $path = $file->move(public_path() . '/uploads', $newName);
            // 将图片上传到OSS 阿里云
            OSS::upload('uploads/'.date('Ymd',time()).'/'.$newName, $file->getRealPath());
//        返回文件的上传路径
            $filepath = 'uploads/'.date('Ymd',time()).'/' . $newName;
            $res = "http://lamp182-weibo.oss-cn-beijing.aliyuncs.com/".$filepath;
            return $res;
        }
    }
    /**
     * 显示广告添加页面
     *
     *
     */
    public function index(Request $request)
    {

        $adPosition = Ad_position::all();
        return view('home.ad.adadd',compact('adPosition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 处理提交表单数据
     *
     *
     *
     */
    public function store(Request $request)
    {
        //  获取请求中的所有数据，除了_token  file_upload
        $input = Input::except('_token','file_upload','num','price');
        $adOrder = Ad_order::orderBy('oid','desc')->max('oid');
        $session = $request->session()->get('user_home');
//                 dd($session);
        $input['ad_ctime'] = strtotime($input['ad_ctime']);
        $input['ad_etime'] = strtotime($input['ad_etime']);
        $input['username'] = $session['phone'];
        $input['status'] = 2;
        $input['oid'] = $adOrder+1;
//        dd($input);
        // 通过ad模型的create  or   save 添加到数据库
        $re = Ad::create($input);

//        如果成功跳转到文章列表页  如果失败 返回添加页面
        if($re){
            return redirect('home/ad');
        }else{
            return back()->with('error','添加失败');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
