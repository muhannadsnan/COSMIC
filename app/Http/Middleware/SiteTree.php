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
        session([
            'app.base' => $request->route()->parameter('basis'),
            'app.profile' => $request->route()->parameter('profile'),
        ]);
        return $next($request);
    }
}
