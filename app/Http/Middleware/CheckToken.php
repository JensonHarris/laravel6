<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //请求中间件，定义好之后需要 app/Http/Kernel.php 中注册此中间件才会生效
        if ($request->input('token') != "laravel6"){
//            dd($request->input('token'));
        }

        return $next($request);
    }
}
