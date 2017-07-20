<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_v;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BigvauditController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.audit.bigvaudit');
    }

    /**
     * 将用户提交信息写入User_vs表
     * @param Request 用户提交认证信息
     * @return json
     */
    public function doaudit(Request $request)
    {
        $info = [];
        $info['uid'] = session('user_home')->uid;
        $info['username'] = session('user_home')->phone;
        $info['v_name'] = $request->v_name;
        $info['type'] = $request->type;
        $info['status'] = 2;
        $info['p_time'] = time();
        $res = User_v::create($info);
        if($res){
            $data = ['status'=>0];
        }else{
            $data = ['status'=>4];
        }
        return $data;

    }

    /**
     * 验证提交大V名称是否存在
     * @param Request 大V名称
     * @return array
     */
    public function checkname(Request $request)
    {
        $cname = $request->v_name;
        $res = User_v::where('v_name',$cname)->first();
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
