<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdController extends CommonController
{
    /**
     *
     * 显示广告中心
     *
     */
    public function index(Request $request)
    {
        $session = $request->session()->get('user_home');
        $phone = $session['phone'];
        $data = Ad::where('username',$phone)->get();
//        dd($data);
        $position = array(1=>'首页上方广告',2=>'首页中间广告',3=>'首页下方广告',4=>'首页轮播广告');
        $status = array(1=>'已发布',2=>'待审核',3=>'审核已驳回',4=>'审核未收款');
        return view('home.ad.index',compact('data','status','position'));
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
