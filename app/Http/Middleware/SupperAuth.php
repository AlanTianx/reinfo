<?php

namespace App\Http\Middleware;

use Closure;

class SupperAuth
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
        if(session('user.us_name')!='admin'){
            return back()->with('errors','超级管理员权限使用');
        }
        return $next($request);
    }
}
