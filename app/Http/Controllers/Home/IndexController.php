<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Ad;
use App\Http\Model\Ad_order;
use App\Http\Model\Link;
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
        $pic = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',1)->first();
        $pic2 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',2)->first();
        $pic3 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',3)->first();
        $pic4 = Ad::where('ad_ctime','<',time())->where('ad_etime','>',time())->where('pid',4)->get();
        $pic5 = Ad_order::orderBy('price','desc')->join('ads','ad_orders.aid','=','ads.aid')->get();
        $links = Link::all();
//        dd($pic);
        return view('home.index.index',compact('pic','pic2','pic3','pic4','pic5','links'));
    }


}
