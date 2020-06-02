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

Route::get('hello',function (){
   return 'hello Jeason harris';
});

Route::get("/user", "admin\UserController@index");

//如果注册一个路由需要相应多种Http请求，可以通过match方法来实现
Route::match(['get','post'],'foo',function (){
   return 'This is request from get or psot';
});

//如果一个路由可以相应所有的Http请求动作可以使用any方法注册
Route::any('bar',function (){
   return "This is a request from any HTTP verb";
});
