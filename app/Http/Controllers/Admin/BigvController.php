<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\User;
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
        $old_v_name = '';
        $old_s_time = '';
        $old_e_time = '';
        if (!empty($request->except('page'))) {
            $log = User_v::orderBy('v_id','desc');

            if ($request->has('v_name')) {
                $v_name = trim($request['v_name']);
                $log = $log->where("v_name", 'like', "%{$v_name}%");
                $old_v_name = $v_name;
            }
            if ($request->has('s_time')) {
                $s_time = strtotime($request['s_time']);
                $log = $log->where("p_time", '>', $s_time);
                $old_s_time = $request->get('s_time');
            }
            if ($request->has('e_time')) {
                $e_time = strtotime($request['e_time']) + 86400;
                $log = $log->where("p_time", '<', $e_time);
                $old_e_time = $request->get('e_time');
            }
            $log = $log->where('status','<>',2);
            $data = $log->paginate(4);
            return view('admin.bigv.audited', ['data' => $data, 'v_name' => $old_v_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }else{
            //显示已审核企业用户列表
            $data = User_v::where('status','<>',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.bigv.audited',['data'=>$data,'v_name' => $old_v_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }
    }



    /**
     * 显示未审核企业申请列表
     */
    public function notaudited(Request $request)

    {

        $old_v_name = '';
        $old_s_time = '';
        $old_e_time = '';
        if (!empty($request->except('page'))) {
            $log = User_v::orderBy('v_id','desc');

            if ($request->has('v_name')) {
                $v_name = trim($request['v_name']);
                $log = $log->where("v_name", 'like', "%{$v_name}%");
                $old_v_name = $v_name;
            }
            if ($request->has('s_time')) {
                $s_time = strtotime($request['s_time']);
                $log = $log->where("p_time", '>', $s_time);
                $old_s_time = $request->get('s_time');
            }
            if ($request->has('e_time')) {
                $e_time = strtotime($request['e_time']) + 86400;
                $log = $log->where("p_time", '<', $e_time);
                $old_e_time = $request->get('e_time');
            }
            $log = $log->where('status',2);
            $data = $log->paginate(4);
            return view('admin.bigv.notaudited', ['data' => $data, 'v_name' => $old_v_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }else{
            //显示已审核企业用户列表
            $data = User_v::where('status',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.bigv.notaudited',['data'=>$data,'v_name' => $old_v_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
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
    public function update(Request $request,$id)
    {
        //
        $sta = Input::get('sta');
        if($sta== 1){
            $res = User_v::where('v_id',$id)->update(['status'=>1,'a_time'=>time(),'auditor'=>session('user')->username]);
            $res_1 = User::where('uid',$request->uid)->update(['type'=>4]);
            if($res && $res_1){
                $content = '大V审核通过: 编号'.$id;
                Admin_log::dolog($content);

                $data = [
                    'status' => 0,
                    'msg'    =>'审核已通过'
                ];
            }else{
                $content = '大V审核未通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核未通过'
                ];
            }
            return $data;
        }
        if($sta == 2){
            $res = User_v::where('v_id',$id)->update(['status'=>3,'a_time'=>time(),'auditor'=>session('user')->username]);
            if($res){
                $content = '大V审核驳回: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已驳回'
                ];
            }else{
                $content = '大V审核驳回失败: 编号'.$id;
                Admin_log::dolog($content);
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
