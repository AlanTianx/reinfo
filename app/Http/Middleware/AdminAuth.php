<?php

namespace App\Http\Middleware;

use App\Http\Model\Admin\RouteList;
use Closure;

class AdminAuth
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
        if(!session('user')){
            return redirect(route('a_login'))->with('error','登录后操作！');
        }
        $data = RouteList::pluck('route');
        if(!$data->contains($request->route()->uri())){
            return redirect(url('admin/info'))->with('errors','没有这个路由！');
        }
        return $next($request);
    }
}
