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
   return redirect('/home/login/login');
});



//后台登录页
Route::get('/admin/login','Admin\LoginController@login');
//处理登录
Route::post('/admin/dologin','Admin\LoginController@dologin');
//验证码路由
Route::get('/admin/code','Admin\LoginController@code');
//如果权限不够，重定向路由
Route::get('/back',function(){
    return view('errors.403');
});
//后台模块
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login','has.role']], function(){
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
    //后台权限子权限
    Route::get('addson/{id}','PermissionController@addson');
    Route::post('doaddson','PermissionController@doaddson');
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
    Route::get('comment/{id}','CommentController@index');
    //后台回复管理
    Route::get('reply/{id}','ReplyController@index');
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
    Route::any('adPositionAjax','AdPositionController@adPositionAjax');
    //后台广告审核
    Route::resource('audit','AuditController');
    Route::any('charge/{id}','AuditController@charge');
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
//忘记密码,找回密码 手机验证路由
Route::controller('/home/phone','Home\LoginController');


//个人中心路由
Route::get('/home/userinfo','Home\UserController@index');
//显示个人信息
Route::get('/home/info','Home\UserController@info');
//修改个人信息
Route::get('/home/edit','Home\UserController@edit');
//处理个人信息
Route::post('/home/doedit','Home\UserController@doedit');
//邮箱激活
Route::get('/home/email','Home\UserController@email');
Route::post('/home/doemail','Home\UserController@doemail');
Route::get('/home/jihuo','Home\UserController@jihuo');
//个人中心的修改密码
Route::get('/home/repass','Home\PwdController@repass');
Route::post('/home/dorepass','Home\PwdController@dorepass');



Route::group(['prefix'=>'home','namespace'=>'Home'], function() {

    //前台首页
    Route::get('index','IndexController@index');
    //前台收藏页
    Route::get('collect','DetailsController@collectindex');
    //前台关注页
    Route::get('attention','DetailsController@attentionindex');
    //前台获取微博评论
    Route::post('index/comment/{id}','CommonindexController@comment');
    //前台执行评论
    Route::post('index/docomment/{id}','CommonindexController@docomment');
    //前台回复
    Route::post('index/reply','CommonindexController@reply');
    //前台收藏
    Route::post('index/collect/{id}','CommonindexController@collect');
    //前台取消收藏
    Route::post('index/nocollect/{id}','CommonindexController@nocollect');
    //前台转发
    Route::post('index/transpond/{id}','CommonindexController@transpond');
    //前台关注
    Route::post('index/attention/{id}','CommonindexController@attention');
    //前台取消关注
    Route::post('index/noattention/{id}','CommonindexController@noattention');
    //前台点赞
    Route::post('index/zan/{id}','CommonindexController@zan');


    //个人中心-我提交的申请

    Route::post('auditcheck','MyauditController@check');
    Route::resource('myaudit','MyauditController');
    //个人中心-公司申请
    Route::post('company/doaudit','CompanyauditController@doaudit');
    Route::resource('company','CompanyauditController');

    Route::post('company/checkname','CompanyauditController@checkname');
    //个人中心-商业申请
    Route::resource('commerce','CommerceauditController');
    Route::post('commerce/doaudit','CommerceauditController@doaudit');
    Route::post('commerce/checkname','CommerceauditController@checkname');
    //个人中心-大V申请
    Route::resource('bigv','BigvauditController');
    Route::post('bigv/doaudit','BigvauditController@doaudit');
    Route::post('bigv/checkname','BigvauditController@checkname');


    //前台详情页
    Route::get('details','DetailsController@index');



    //前台发布微博
    Route::get('microblog','IndexController@microblog');
    Route::post('microblogAjax','IndexController@microblogAjax');
//    Route::get('navigation','IndexController@navigation');

    // 前台广告中心路由
    Route::get('ad','AdController@index');
    // 前台广告申请路由
    Route::resource('adadd','AdaddController');
    Route::any('upload','AdaddController@upload');



});
