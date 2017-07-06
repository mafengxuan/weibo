<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User_v;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BigvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $log = (new User_v);
        $res = Input::except('page');
        if($res){
            if($res['v_name']){

                $log = $log->where("v_name",'like','%'.trim($res['v_name']).'%');
            }
            if($res['s_time'] && $res['e_time']){
                $s_time = strtotime($res['s_time']);
                $e_time = strtotime($res['e_time'])+86400;
                $log = $log->whereBetween("p_time",[$s_time,$e_time]);
            }
            if($res['s_time'] && !$res['e_time']){
                $s_time = strtotime($res['s_time']);
                $log = $log->where("p_time",'>',$s_time);
            }
            if(!$res['s_time'] && $res['e_time']){
                $e_time = strtotime($res['e_time'])+86400;
                $log = $log->where("p_time",'<',$e_time);
            }
            $data = $log->paginate(4);
            return view('admin.bigv.audited',['data'=>$data,'res'=>$res]);
        }else{
            //显示已审核大V用户列表
            $data = User_v::where('status','<>',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.bigv.audited',['data'=>$data,'res'=>$res]);
        }
    }



    /**
     * 显示未审核企业申请列表
     */
    public function notaudited()

    {

        $data = User_v::where('status',2)->orderBy('p_time','asc')->paginate(4);

        return view('admin.bigv.notaudited',['data'=>$data]);
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
            $res = User_v::where('v_id',$id)->update(['status'=>1,'a_time'=>time()]);
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
            $res = User_v::where('v_id',$id)->update(['status'=>3,'a_time'=>time()]);
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
