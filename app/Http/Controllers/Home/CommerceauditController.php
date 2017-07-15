<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User_commerce;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class commerceauditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.audit.commerceaudit');
    }

    public function doaudit(Request $request)
    {
        $info = [];
        $info['uid'] = session('user_home')->uid;
        $info['username'] = session('user_home')->phone;
        $info['company_name'] = $request->company_name;
        $info['cooperation'] = $request->cooperation;
        $info['status'] = 2;
        $info['p_time'] = time();
        $res = User_commerce::create($info);
        if($res){
            $data = ['status'=>0];
        }else{
            $data = ['status'=>4];
        }
        return $data;

    }

    public function checkname(Request $request)
    {
        $cname = $request->company_name;
        $res = User_commerce::where('company_name',$cname)->first();
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
