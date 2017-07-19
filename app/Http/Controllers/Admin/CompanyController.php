<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin_log;
use App\Http\Model\User;
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
        $old_company_name = '';
        $old_s_time = '';
        $old_e_time = '';
        if (!empty($request->except('page'))) {
            $log = User_company::orderBy('company_id', 'desc');

            if ($request->has('company_name')) {
                $company_name = trim($request['company_name']);
                $log = $log->where("company_name", 'like', "%{$company_name}%");
                $old_company_name = $company_name;
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
            return view('admin.company.audited', ['data' => $data, 'company_name' => $old_company_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }else{
            //显示已审核企业用户列表
            $data = User_company::where('status','<>',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.company.audited',['data'=>$data,'company_name' => $old_company_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }
    }



    /**
     * 显示未审核企业申请列表
     */
    public function notaudited(Request $request)
    {
        $old_company_name = '';
        $old_s_time = '';
        $old_e_time = '';
        if (!empty($request->except('page'))) {
            $log = User_company::orderBy('company_id', 'desc');

            if ($request->has('company_name')) {
                $company_name = trim($request['company_name']);
                $log = $log->where("company_name", 'like', "%{$company_name}%");
                $old_company_name = $company_name;
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
            return view('admin.company.notaudited', ['data' => $data, 'company_name' => $old_company_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }else{
            //显示未审核企业用户列表
            $data = User_company::where('status',2)->orderBy('p_time','desc')->paginate(4);

            return view('admin.company.notaudited',['data'=>$data,'company_name' => $old_company_name, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
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
            $res = User_company::where('company_id',$id)->update(['status'=>1,'a_time'=>time(),'auditor'=>session('user')->username]);
            $res_1 = User::where('uid',$request->uid)->update(['type'=>2]);
            if($res && $res_1){
                $content = '企业用户审核通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已通过'
                ];
            }else{
                $content = '企业用户审核未通过: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 4,
                    'msg'    =>'审核未通过'
                ];
            }
            return $data;
        }
        if($sta == 2){
            $res = User_company::where('company_id',$id)->update(['status'=>3,'a_time'=>time(),'auditor'=>session('user')->username]);
            if($res){
                $content = '企业用户审核驳回: 编号'.$id;
                Admin_log::dolog($content);
                $data = [
                    'status' => 0,
                    'msg'    =>'审核已驳回'
                ];
            }else{
                $content = '企业用户审核驳回失败: 编号'.$id;
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
