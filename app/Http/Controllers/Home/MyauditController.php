<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_commerce;
use App\Http\Model\User_company;
use App\Http\Model\User_v;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyauditController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示用户提交申请信息
        $username = session('user_home')->phone;
        $r1 = User_company::where('username',$username)->orderby('p_time','desc')->first();
        $r2 = User_commerce::where('username',$username)->orderby('p_time','desc')->first();
        $r3 = User_v::where('username',$username)->orderby('p_time','desc')->first();
        if(!empty($r1)){
            $type = '公司认证';
            $r = $r1;
        }elseif (!empty($r2)){
            $type = '商业认证';
            $r = $r2;
        }elseif(!empty($r3)){
            $type = '大V认证';
            $r = $r3;
        }else{
            $type = '未认证';
            $r = '';
        }
        return view('home.audit.myaudit',compact('type','r'));
    }

    /**
     * 查询用户是否提交过申请
     * @return 0未申请 4申请过或有待审核申请
     */
    public function check()
    {
        $username = session('user_home')->phone;
        $res_company = User_company::where('username',$username)->where('status','<>',3)->first();
        $res_commerce = User_commerce::where('username',$username)->where('status','<>',3)->first();
        $res_bigv = User_v::where('username',$username)->where('status','<>',3)->first();
        //三个表中都不存在包含该用户名或者用户提交过已被驳回（status=3）的情况下判断用户可提交申请
        if((empty($res_company) && empty($res_commerce) && empty($res_bigv)))
        {
            $data = [
                'status' => 0,
                'msg'    =>''
            ];
        }
        else{
            $data = [
                'status' => 4,
                'msg'    =>''
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
        //
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
