<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //取消web路由下的CSRF保护检查，设置之后该路由CSRF路由检查时将被排除，设置方法路由以逗号分隔开
        //如果路由定义在Api下的话，我们不需要关系CSRF保护问题
        'foo','bar'
    ];
}
