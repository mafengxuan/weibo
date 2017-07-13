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
    return view('home.index.index');
});

//后台登录页
Route::get('/admin/login','Admin\LoginController@login');

//处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');

//验证码路由
Route::get('/admin/code','Admin\LoginController@code');

//后台模块
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin.login'], function(){
//Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){

    //后台主页面
    Route::resource('index', 'IndexController');
    //后台欢迎页
    Route::get('welcome','IndexController@welcome');
    //退出登录
    Route::get('quit','IndexController@quit');
    //修改密码
    Route::get('repass','PwdController@repass');
    Route::post('dorepass','PwdController@dorepass');
    //后台普通用户
    Route::resource('user','UserController');
    //后台管理员
    Route::resource('manager','ManagerController');

    //后台角色管理
    Route::resource('role','RoleController');
    //后台权限管理
    Route::resource('permission','PermissionController');

    //管理员日志
    Route::get('log','LogController@index');


    //后台企业用户 company
    Route::resource('company','CompanyController');
    Route::get('companynotaudited','CompanyController@notaudited');


    Route::get('abc','CompanyController@abc');


    //后台商业用户 commerce
    Route::resource('commerce','CommerceController');
    Route::get('commercenotaudited','CommerceController@notaudited');

    //后台大V用户 bigv
    Route::resource('bigv','BigvController');
    Route::get('bigvnotaudited','BigvController@notaudited');

    //后台网站配置
    Route::get('config/putfile','ConfigController@putfile');
    Route::resource('config','ConfigController');

    Route::post('config/change','ConfigController@change');
    Route::post('config/{id}','ConfigController@del');



    //后台微博管理
    Route::resource('microblog','MicroblogController');
    //后台评论管理
    Route::resource('comment','CommentController');
    //后台回复管理
    Route::resource('reply','ReplyController');
    //后台导航管理
    Route::resource('navigation','NavigationController');
    Route::any('navigation/changeorder','NavigationController@changeOrder');
    //后台内容详情管理
    Route::resource('content','ContentController');
    //后台标签管理
    Route::resource('label','LabelController');
    //后台热门管理
    Route::resource('hot','HotController');
    //后台每日热门管理
    Route::resource('hotcontent','HotcontentController');

    //后台时事热门管理
    Route::resource('currentevent','CurrenteventController');




    //后台广告管理
    Route::resource('ad','AdController');
    Route::any('upload','AdController@upload');
    //后台广告位管理
    Route::resource('adPosition','AdPositionController');
    //后台广告审核
    Route::resource('audit','AuditController');
    //后台广告收费管理
    Route::resource('order','OrderController');
    //后台收益管理
    Route::get('lineChart','LineChartController@index');
    //后台友情链接管理
    Route::resource('link','LinkController');
    Route::any('link/changeorder','LinkController@changeOrder');
});


//前台模块


//前台注册
Route::controller('/home/zhuce','Home\ZhuceController');
//前台登录
Route::get('/home/login/login','Home\LoginController@login');
//处理登录
Route::post('/home/login/dologin','Home\LoginController@dologin');
//退出登录
Route::get('/home/quit','Home\LoginController@quit');


//个人中心路由
Route::get('/home/userinfo','Home\UserController@index');
//显示个人信息
Route::get('/home/info','Home\UserController@info');
//修改个人信息
Route::get('/home/edit','Home\UserController@edit');
Route::post('/home/doedit','Home\UserController@doedit');

//修改密码
Route::get('/home/repass','Home\PwdController@repass');
Route::post('/home/dorepass','Home\PwdController@dorepass');

Route::group(['prefix'=>'home','namespace'=>'Home'], function() {

    //前台首页
    Route::get('index','IndexController@index');


    //前台详情页
    Route::get('details','DetailsController@index');

});

