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
    //后台微博管理
    Route::resource('/admin/microblog','Admin\MicroblogController');
    //后台评论管理
    Route::resource('/admin/comment','Admin\CommentController');
    //后台回复管理
    Route::resource('/admin/reply','Admin\ReplyController');
    //后台导航管理
    Route::resource('/admin/navigation','Admin\NavigationController');

});