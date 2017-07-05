<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台模块
Route::group([], function(){
    //后台主页面
    Route::resource('/admin/index', 'Admin\IndexController');
    //后台欢迎页
    Route::get('/admin/welcome','Admin\IndexController@welcome');
    //后台广告管理
    Route::resource('/admin/ad','Admin\AdController');
    // 后台广告位管理
    Route::resource('/admin/adPosition','Admin\AdPositionController');
    //后台广告审核
    Route::resource('/admin/audit','Admin\AuditController');
});