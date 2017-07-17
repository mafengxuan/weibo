<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class companyauditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.audit.companyaudit');
    }

    /**
     * 文件上传
     *
     * @return 文件上传路径
     */
    public function upload()
    {
        $file = Input::file('file_upload');
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move(public_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            return  $filepath;
        }
    }

    /**
     * 将用户提交信息写入User_companys表
     * @param Request 用户提交认证信息
     * @return json
     */
    public function doaudit(Request $request)
    {
        $info = [];
        $info['uid'] = session('user_home')->uid;
        $info['username'] = session('user_home')->phone;
        $info['company_name'] = $request->company_name;
        $info['company_img'] = $request->company_img;
        $info['price'] = $request->price;
        $info['status'] = 2;
        $info['p_time'] = time();
        $res = User_company::create($info);
        if($res){
            $data = ['status'=>0];
        }else{
            $data = ['status'=>4];
        }
        return $data;

    }

    /**
     * 验证提交公司名称是否存在
     * @param Request 公司名称
     * @return array
     */
    public function checkname(Request $request)
    {
        $cname = $request->company_name;
        $res = User_company::where('company_name',$cname)->first();
        if($res){
            $data = [
                'status' => '4'
            ];
        }elseif($res==null){
            $data = [
                'status' => '0'
            ];
        }
        return $data;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
