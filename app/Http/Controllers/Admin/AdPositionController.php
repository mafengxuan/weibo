<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Ad_position;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // 根据keywords搜索
        if($request->has('keywords')){
            $key = trim($request->input('keywords'));
            $data = Ad_position::where('ad_name','like','%'.$key.'%')->get();
            $status = array(1=>'占用',2=>'闲置');
            return view('admin/ad_position/index',['data'=>$data,'status'=>$status,'key'=>$key]);
        }else{
            // 获取所有数据
            $data = Ad_position::orderBy('aid','asc')->get();
            $status = array(1=>'占用',2=>'闲置');

            //添加到列表页
            return view('admin/ad_position/index',['data'=>$data,'status'=>$status]);
        }
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
