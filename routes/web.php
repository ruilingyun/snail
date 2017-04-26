<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//前台首页控制器
//个人中心主页路由
Route::get('home/personalCenter', 'Home\IndexController@personalCenter');
//个人中心相册路由
Route::get('home/personalImages', 'Home\IndexController@personalImages');
//个人中心管理路由
Route::get('home/personalManger', 'Home\IndexController@personalManger');

//轮播图
Route::get('home/lunbotu', 'Home\IndexController@adv' );
//百度地图接口
Route::get('home/baiduditu', 'Home\IndexController@baidu' );

// 后台登录
Route::get('admin/login', 'Admin\IndexController@showLogin');
Route::post('admin/doLogin', 'Admin\IndexController@doLogin');
// 后台退出
Route::get('admin/outlogin', 'Admin\IndexController@outLogin');

//荣连云短信发送验证码
Route::get('home/sendSMS', 'Home\UserController@sendSMS');

//前台首页
Route::get('home/index','Home\IndexController@index');

// 前台登录
Route::get('home/showLogin', 'Home\IndexController@showLogin');
Route::post('home/doLogin', 'Home\IndexController@doLogin');
// 前台注册
Route::get('home/register', 'Home\UserController@register');
Route::post('home/store', 'Home\UserController@store');
Route::get('verify/{confirmed_code}', 'Home\UserController@emailConfirm');
//前台手机注册
Route::get('home/phoneregister', 'Home\UserController@phoneregister');



//后台首页控制器
Route::get('admin/index','Admin\IndexController@index');


//权限管理
Route::get('admin/permission-list', 'Admin\PermissionController@permissionList');
Route::any('admin/permission-add', 'Admin\PermissionController@permissionadd');
Route::any('admin/permission-update/{permission_id}', 'Admin\PermissionController@permissionupdate');
Route::get('admin/permission-delete/{permission_id}', 'Admin\PermissionController@permissiondelete');


//角色管理
Route::get('admin/role-list', 'Admin\RoleController@roleList');
Route::any('admin/role-add', 'Admin\RoleController@roleadd');
Route::any('admin/role-update/{role_id}', 'Admin\RoleController@update');
Route::get('admin/role-delete/{role_id}', 'Admin\RoleController@roledelete');
Route::any('admin/allot-permission/{role_id}', 'Admin\RoleController@allotpermission');


//管理员管理
Route::get('admin/user-list', 'Admin\UserController@userlist');
Route::any('admin/user-add', 'Admin\UserController@useradd');
Route::any('admin/user-update/{user_id}', 'Admin\UserController@userupdate');
Route::any('admin/user-delete/{user_id}', 'Admin\UserController@userdelete');
Route::any('admin/allot-role/{user_id}', 'Admin\UserController@allotrole');


//用户管理
//普通用户
Route::get('admin/users-list', 'Admin\UsersController@userslist');
Route::get('admin/users-delete/{user_id}', 'Admin\UsersController@delete');
//Route::any('admin/users-update/{id}', 'Admin\UsersController@update');
Route::get('admin/users-detail/{id}', 'Admin\UsersController@detail');
//vip用户
Route::get('admin/vip-list', 'Admin\VipController@viplist');
Route::get('admin/users-delete/{user_id}', 'Admin\VipController@delete');
//Route::any('admin/users-update/{id}', 'Admin\UsersController@update');
Route::get('admin/vip-detail/{id}', 'Admin\VipController@detail');

//管理员
Route::get('admin/manager-list', 'Admin\ManagerController@managerlist');
Route::get('admin/users-delete/{user_id}', 'Admin\ManagerController@delete');
//Route::any('admin/users-update/{id}', 'Admin\UsersController@update');
Route::get('admin/manager-detail/{id}', 'Admin\ManagerController@detail');

//超级管理员
Route::get('admin/super-list', 'Admin\SuperController@superlist');
Route::get('admin/users-delete/{user_id}', 'Admin\SuperController@delete');
//Route::any('admin/users-update/{id}', 'Admin\UsersController@update');
Route::get('admin/super-detail/{id}', 'Admin\SuperController@detail');

//用户状态管理
Route::get('admin/start-users/{user_id}', 'Admin\UsersController@startusers');
Route::get('admin/forbidden-users/{user_id}', 'Admin\UsersController@forbiddenusers');



//新闻管理
Route::get('admin/new-list', 'Admin\NewController@newlist');
//登录前新闻详情
Route::get('admin/new-detail/{id}', 'Admin\NewController@newdetail');
//登录后新闻详情
Route::get('home/new-detail/{id}', 'Home\NewController@newdetail');
//添加新闻
Route::any('admin/new-publish', 'Admin\NewController@newpublish');
//删除新闻
Route::get('admin/new-delete/{id}', 'Admin\NewController@newdelete');
//修改新闻
Route::any('admin/new-update/{id}', 'Admin\NewController@newupdate');

//新闻状态管理
Route::get('admin/is-hot/{id}', 'Admin\NewController@ishot');
Route::get('admin/not-hot/{id}', 'Admin\NewController@nothot');


//新闻分类列表
Route::get('admin/type-list' ,'Admin\TypeController@typelist');
//添加新闻分类
Route::any('admin/type-add', 'Admin\TypeController@typeadd');
//修改新闻类别
Route::any('admin/type-update/{id}', 'Admin\TypeController@typeupdate');
//删除新闻分类
Route::get('admin/type-delete/{id}', 'Admin\TypeController@typedelete');






//广告管理
//广告列表
Route::get('admin/advert-list', 'Admin\AdvertController@advertlist');
//添加广告
Route::any('admin/advert-add', 'Admin\AdvertController@advertadd');
//修改广告
Route::any('admin/advert-update/{id}', 'Admin\AdvertController@advertupdate');
//删除广告
Route::get('admin/advert-delete/{id}', 'Admin\AdvertController@advertdelete');
//上架广告
Route::get('admin/advert-online', 'Admin\AdvertController@advertonline');

//广告状态
//上架
Route::get('admin/up-status/{id}', 'Admin\AdvertController@upstatus');
Route::get('admin/down-status/{id}', 'Admin\AdvertController@downstatus');


//商品管理
//商品列表
Route::get('admin/goods-list', 'Admin\GoodsController@goodslist');
//添加商品
Route::any('admin/goods-add', 'Admin\GoodsController@goodsadd');
//修改商品
Route::any('admin/goods-update/{id}', 'Admin\GoodsController@goodsupdate');
//删除商品
Route::get('admin/goods-delete/{id}', 'Admin\GoodsController@goodsdelete');
//
////商品状态
Route::get('admin/up_status/{id}', 'Admin\GoodsController@upstatus');
Route::get('admin/down_status/{id}', 'Admin\GoodsController@downstatus');

//商品分类管理
//商品分类列表
Route::get('admin/goodstype-list', 'Admin\GoodstypeController@goodstypelist');
//添加商品分类
Route::any('admin/goodstype-add', 'Admin\GoodstypeController@goodstypeadd');
//修改商品分类
Route::any('admin/goodstype-update/{id}', 'Admin\GoodstypeController@goodstypeupdate');
//删除商品分类
Route::any('admin/goodstype-delete/{id}', 'Admin\GoodstypeController@goodstypedelete');






//前台好友管理
Route::get('home/myuser','Home\myuserController@myuser');
//粉丝
Route::get('home/myfans','Home\myuserController@myfans');
//收藏微博
Route::get('home/collect/{id}','Home\UserController@collect');
//转发微博
Route::get('home/relay/{id}','Home\UserController@relay');



//上传照片
Route::post('home/photolist','Home\PhotoController@upphotos');

//个人资料
//上传资料
Route::post('home/setmass','Home\myMassController@setmass');
//修改资料
Route::post('home/resetmass','Home\myMassController@resetmass');


//上传相册
Route::post('home/photos','Home\PhotoController@photos');
//照片列表
Route::get('home/photoList/{id}','Home\PhotoController@photolist');
//上传照片
Route::post('home/upphoto/{id}','Home\PhotoController@upphoto');


//头像
Route::get('home/icon','Home\accountController@icon');
//隐私设置
Route::get('home/privacy','Home\accountController@privacy');
//消息设置
Route::get('home/news','Home\accountController@news');
//隐私设置
Route::get('home/screen','Home\accountController@screen');



//发微博
Route::get('home/login-index', 'Home\UserController@pushMsg');
Route::post('home/login-index', 'Home\UserController@doPush');
// 删除微博
Route::get('home/delMsg/{id}', 'Home\UserController@delMsg');
// 评论
Route::post('home/comment', 'Home\UserController@doComment');
Route::get('home/delCom/{id}', 'Home\UserController@delCom');


//个人资料
//上传资料
Route::post('home/setmass','Home\myMassController@setmass');
//修改资料
Route::post('home/resetmass','Home\myMassController@resetmass');
//上传相册
Route::post('home/photos','Home\PhotoController@photos');
//照片列表
Route::get('home/photoList/{id}','Home\PhotoController@photolist');
//上传照片
Route::post('home/upphoto','Home\PhotoController@upphoto');

//前台个人设置
//账号设置->个人信息
Route::get('home/myMass','Home\accountController@myMass');
//修改昵称
Route::get('home/name-update/{role_id}', 'Home\accountController@userupdate');
//修改密码
Route::any('home/pwd-update/{role_id}', 'Home\accountController@setpwd');
//修改头像
Route::any('home/icon-update/{role_id}', 'Home\accountController@iconupdate');
//修改密码
Route::any('home/pwd-update/{role_id}', 'Home\accountController@doPassword');

//上传照片
Route::post('home/photolist','Home\PhotoController@upphotos');

//前台退出登录
Route::get('/home/logout', 'Home\IndexController@logout');



//个人中心
//个人信息显示
Route::get('admin/personal-infor', 'Admin\PersonalController@personalinfor');
//个人信息修改
Route::any('admin/personal-update/{id}', 'Admin\PersonalController@personalupdate');
//个人信息删除
Route::any('admin/personal-delete/{id}', 'Admin\PersonalController@personaldelete');
//个人头像修改
Route::any('admin/icon-update/{id}', 'Admin\PersonalController@iconupdate');



