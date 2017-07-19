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
    public function index(Request $request)
    {

        $old_content = '';
        $old_s_time = '';
        $old_e_time = '';
        if (!empty($request->except('page'))) {
            $log = Admin_log::orderBy('id', 'desc');

            if ($request->has('content')) {
                $content = trim($request['content']);
                $log = $log->where("content", 'like', "%{$content}%");
                $old_content = $content;
            }
            if ($request->has('s_time')) {
                $s_time = strtotime(trim($request['s_time']));
                $log = $log->where("ctime", '>', $s_time);
                $old_s_time = $request->get('s_time');
            }
            if ($request->has('e_time')) {
                $e_time = strtotime(trim($request['e_time'])) + 86400;
                $log = $log->where("ctime", '<', $e_time);
                $old_e_time = $request->get('e_time');
            }
            $data = $log->paginate(20);
            return view('admin.log.index', ['data' => $data, 'content' => $old_content, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        } else {
            $data = Admin_log::orderBy('id', 'desc')->paginate(20);
            return view('admin.log.index', ['data' => $data, 'content' => $old_content, 's_time'=> $old_s_time, 'e_time'=> $old_e_time]);
        }


    }
}
