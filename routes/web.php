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

Route::get("/user", "Admin\UserController@index");

//如果注册一个路由需要相应多种Http请求，可以通过match方法来实现
Route::match(['get','post'],'foo',function (){
   return 'This is request from get or psot';
});

//如果一个路由可以相应所有的Http请求动作可以使用any方法注册
Route::any('bar',function (){
   return "This is a request from any HTTP verb";
});

//路由重定向
Route::redirect('/here', 'user');

//路由参数 访问时http://xxx.com/show/3 即可
Route::get('show/{id}', function ($id){
    return 'show'.$id; //show3
});
//还可以根据需要定义多个路由
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});

//限制路由访问频率 'throttle:6,1' 表示每分钟限制次数为6次
Route::get('test', function(){
    return 'helle world' ;
})->middleware('throttle:6,1');

//正则路由 可以通过路由实例上的where方法来约束路由参数格式
Route::get('user/{name}', function ($name) {
    // $name 必须是字母且不能为空
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    // $id 必须是数字
    return $id;
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    // 同时指定 id 和 name 的数据格式
    return $id.'-'.$name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//访问当前路由
Route::get('rule/jes',function (){
    // 获取当前路由实例
    $route = Route::current();
    // 获取当前路由名称
    $name = Route::currentRouteName();
    // 获取当前路由action属性
    $action = Route::currentRouteAction();
});

//命名路由  命名路由为生成 URL 或重定向提供了方便
Route::get('users/profile', function () {
    // 通过路由名称生成 URL
    return 'my url: ' . route('profile');
})->name('profile');

//我们可以直接通过命名路由重定向到我们需要的命名地址
Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('profile');
});


//兜底路由，当所有的路由都不匹配时将访问次路由，404
Route::fallback(function () {
    return '这是兜底路由';
});
