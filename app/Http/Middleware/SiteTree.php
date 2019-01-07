<?php

namespace App\Http\Middleware;

use Closure;

class SiteTree
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
        if(!empty($request->route())){
            if(!empty($request->route()->parameter('basis'))){
                session([
                    'app.base' => $request->route()->parameter('basis'),
                ]);
            }
            
            if($request->route()->parameter('profile') != null){
                session([
                    'app.profile' => $request->route()->parameter('profile'),
                ]);
            }                
        }
        return $next($request);
    }
}
