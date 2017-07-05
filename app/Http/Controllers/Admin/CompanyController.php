<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\User_company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        if($request->has('keyword')){
//            echo $request->input('keyword');
//        }
//        if($request->has('sd')){
//            echo $request->input('sd');
//        }
//        else{
            //显示已审核企业用户列表
            $data = User_company::where('status','<>',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.company.audited',['data'=>$data]);
        //}
    }



    /**
     * 显示未审核企业申请列表
     */
    public function notaudited()
    {
        $data = User_company::where('status',2)->orderBy('a_time','asc')->paginate(4);

        return view('admin.company.notaudited',['data'=>$data]);
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
    public function update($id)
    {
        //
        $sta = Input::get('sta');
        if($sta== 1){
            $res = User_company::where('company_id',$id)->update(['status'=>1]);
            if($res){
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已通过'
                ];
            }else{
                $data = [
                    'status' => 4,
                    'msg'    =>'审核未通过'
                ];
            }
            return $data;
        }
        if($sta == 2){
            $res = User_company::where('company_id',$id)->update(['status'=>3]);
            if($res){
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已驳回'
                ];
            }else{
                $data = [
                    'status' => 4,
                    'msg'    =>'审核驳回失败'
                ];
            }
            return $data;
        }

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
