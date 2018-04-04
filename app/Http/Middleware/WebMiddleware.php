<?php

namespace App\Http\Middleware;

use App\Http\Model\Admin\Webconfig;
use Closure;

class WebMiddleware
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
        $webInfo = Webconfig::first();
        if($webInfo['is_open']!=1){
            return redirect('error');
        }
        session(['webInfo'=>$webInfo]);
        return $next($request);
    }
}
