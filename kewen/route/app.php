<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

//Route::get('think', function () {
//    return 'hello,ThinkPHP6!';
//});
//
//Route::get('hello/:name', 'index/hello');

//登录模块路由
Route::group(function(){
    Route::get('/','Login/index');
    Route::post('Login_check','Login/check');
});

//注册模块路由
Route::group(function(){
    Route::get('register','Register/UserRegister');
    Route::post('Register','Register/save');
});

Route::group(function(){
    Route::get('upload','Upload/index');
    Route::post('Upload','Upload/upload');
    Route::post('Search','Search/search');
});

Route::get('AAA','AAA/index');
Route::get('picture','Picture/index');
Route::post('Picture_upload','Picture/upload');

Route::get('user','User/index');
Route::post('User_upload','User/Upload');

////上传模块路由
//Route::group(function(){
//    Route::get('Data','Upload/index');
//    Route::post('Data_upload','Upload/upload');
//});
//
////搜索模块路由
//Route::group(function(){
//    Route::post('search','Search/search');
//    Route::get('search','Search/index');
//});
