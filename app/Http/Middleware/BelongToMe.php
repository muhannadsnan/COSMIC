<?php

namespace App\Http\Middleware;

use Closure;

class BelongToMe
{

    // the user of the base/profile is not the logged in user
    // the profile belongs to the present base

    public function handle($request, Closure $next)
    {
        if(!empty($request->route())){
            $base = $request->route()->parameter('basis');
            $profile = $request->route()->parameter('profile');

            if(!empty($base)){ //dd($base);
                if($base->_user->id != auth()->id()){
                    return false;
                }
                $request->request->add(['base' => $base]);
            }
            
            if($profile != null){
                if($profile->_base->_user->id != auth()->id() && $profile->_base->id == $base->id){
                    return false;
                }
                $request->request->add(['profile' => $profile]);
            }                
        }
            return $next($request);
    }
}
