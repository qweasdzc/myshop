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
//前台首页
Route::get('/','IndexController@index');
//商品详情
Route::get('shopcontent/{goods_id}','IndexController@shopcontent');
//注册
Route::get('zhuce','RegisterController@register');
//执行注册
Route::any('do_zhuce','RegisterController@do_zhuce');
//登录
Route::any('logins','RegisterController@login');
//执行登录
Route::any('do_logins','RegisterController@do_login');
//加入购物车
Route::any('gowuche','IndexController@gowuche');
//购物车列表
Route::any('carlist','IndexController@carlist');
//购物车小计
Route::any('xiaoji','IndexController@xiaoji');


//后台首页
Route::any('admin','admin\AdminController@admin');

Route::get('login','LoginController@login');//登录
Route::post('do_login','LoginController@do_login');//登录表单提交
Route::get('redister','LoginController@redister');//注册
Route::post('do_register','LoginController@do_register');//注册表单提交
Route::get('logout','LoginController@logout');//退出


Route::get('/user','UserController@index');



Route::prefix('/brand')->group(function(){
    Route::get('add','BrandController@create');
    Route::post('doadd','BrandController@store');
    Route::get('list','BrandController@index');
    Route::get('show/{id}','BrandController@show');
    Route::get('upd','BrandController@edit');
    Route::post('doupd','BrandController@doupd');
    Route::get('del','BrandController@destroy');
});


Route::prefix('/goods')->middleware('goods')->group(function(){
    Route::get('add','GoodsController@create');
    Route::post('doadd','GoodsController@store');
    Route::get('list','GoodsController@index');
    Route::get('show/{id}','GoodsController@show');
    Route::get('edit','GoodsController@edit');
    Route::post('doupd','GoodsController@update');
    Route::post('del','GoodsController@destroy');
});

Route::prefix('/user')->group(function(){
    Route::get('add','UserController@create');
    Route::post('doadd','UserController@store');
    Route::get('list','UserController@index');
    Route::get('show/{id}','UserController@show');
    Route::get('edit','UserController@edit');
    Route::post('doupd','UserController@update');
    Route::post('del','UserController@destroy');
});
