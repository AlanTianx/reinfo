<?php

namespace App\Http\Middleware;

use App\Http\Model\Admin\RouteList;
use App\Http\Model\Admin\User;
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
        $auth_id = User::where('us_id',session('user.us_id'))->value('auth_id');
        $route_group_id = \App\Http\Model\Admin\Adminauth::whereIn('id',explode(',',$auth_id))->pluck('route_list_id');
        $arr = array();
        foreach ($route_group_id as $k => $v){
            $arr[] = explode(',',$v);
        }
        $route_group_id = collect($arr);
        $route_group_id = $route_group_id->collapse();
        $route_group_id = $route_group_id->unique();
        $routeList = RouteList::whereIn('id',$route_group_id)->pluck('route');
        if(!$routeList->contains($request->route()->uri())){
            return redirect('admin/info')->with('errors','没有使用权限！！！');
        }
        return $next($request);
    }
}
