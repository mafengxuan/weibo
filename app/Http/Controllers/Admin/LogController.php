<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Admin_log;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LogController extends Controller
{
    /**
     * 管理员日志
     * mafengxuan
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $arr = [];
//        $arr['username'] = 'admin';
//        $arr['ctime'] = time();
//        $arr['content'] = '查看管理员日志';
//        $arr['ip'] = ip2long($_SERVER["REMOTE_ADDR"]);
//        Admin_log::create($arr);

        $log = (new Admin_log);
        $res = Input::except('page');

        if($res){
          if($res['content']){

              $log = $log->where("content",'like','%'.trim($res['content']).'%');
          }
          if($res['s_time'] && $res['e_time']){
              $s_time = strtotime($res['s_time']);
              $e_time = strtotime($res['e_time'])+86400;
              $log = $log->whereBetween("ctime",[$s_time,$e_time]);
          }
          if($res['s_time'] && !$res['e_time']){
              $s_time = strtotime($res['s_time']);
              $log = $log->where("ctime",'>',$s_time);
          }
            if(!$res['s_time'] && $res['e_time']){
                $e_time = strtotime($res['e_time'])+86400;
                $log = $log->where("ctime",'<',$e_time);
            }

        }
        $data = $log->paginate(3);

        return view('admin.log.index',['data'=>$data,'res'=>$res]);

    }


}
