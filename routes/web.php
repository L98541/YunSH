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

// Route::get('/', function () {
//     return view('welcome');
// });
    Route::resource('/adminlogin','Admin\AdminLoginController');
    Route::group(['middleware'=>"login"],function(){
    Route::resource('/admin','Admin\AdminController');
    Route::get('/aa/index','Admin\IndexController@index');
    Route::resource('/adminuser','Admin\Users\AdminUsersController');
    Route::get('/UserList','Admin\Users\UsersController@index');
    // Route::get('/useradd','Admin\Users\UsersController@create');
    Route::resource('/useradd','Admin\Users\UsersController');
    //无线分类路由
    Route::resource('/admincates','Admin\CatesController');
    // Route::
    Route::get('/show','Admin\Users\UsersController@show');
    //后台添加用户效验

    //分配角色
    Route::get('/adminrole/{id}','Admin\Users\AdminUsersController@role');
    // Route::get('adminauths/{id}','Admin\Users\AdminUsersController@adminauths');
    Route::post('/saverole','Admin\Users\AdminUsersController@saverole');
    //角色管理
    Route::resource('/adminroles','Admin\RoleController');
    //分配权限
    Route::get('/adminauth/{id}',"Admin\RoleController@adminauth");
    //保存权限
    Route::post('/saveauth','Admin\RoleController@saveauth');
    //添加管理员管理模块
    Route::resource('/auth','Admin\Auth\authController');
    //商品添加
    Route::resource('/shop','Admin\Shop\ShopController');
    Route::resource('/auth','Admin\Auth\authController');
});
    
    
    Route::POST('/username','Admin\CharmController@username');
    Route::POST('/phone','Admin\CharmController@phone');
    Route::POST('/phoneedit','Admin\CharmController@phoneedit');
    Route::POST('/usernameedityz','Admin\CharmController@usernameedityz');
  
//后台管理员添加
// Route::resourc('/')

    Route::get('/asd','Admin\AdminLoginController@asd');