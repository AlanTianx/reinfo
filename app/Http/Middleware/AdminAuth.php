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
//        $data = RouteList::pluck('route');
////        /dump($data);
//        if(!$data->contains($request->route()->uri())){
//            if($request->ajax()){
//                $data = [
//                    'status' => 0,
//                    'msg' => '没有这个路由'
//                ];
//                return back()->with('data',$data);
//            }
//            return redirect(url('admin/info'))->with('error','没有这个路由！');
//        }
//        if(true){
//            echo 4;
//        }
        return $next($request);
    }
}
