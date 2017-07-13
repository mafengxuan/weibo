<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 前台首页
     *
     *
     */
    public function index()
    {
        $pic = Ad::orderBy('ad_ctime','desc')->where('pid',1)->first();
        $pic2 = Ad::orderBy('ad_ctime','desc')->where('pid',2)->first();
        $pic3 = Ad::orderBy('ad_ctime','desc')->where('pid',3)->first();
        $pic4 = Ad::orderBy('ad_ctime','desc')->where('pid',4)->take(3)->get();
        $pic5 = Ad_order::orderBy('price','desc')->join('ads','ad_orders.aid','=','ads.aid')->get();
//        dd($pic5);
        return view('home.index.index',compact('pic','pic2','pic3','pic4','pic5'));
    }


}
