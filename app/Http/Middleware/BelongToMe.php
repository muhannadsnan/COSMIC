<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class BelongToMe
{

    // the user of the base/profile is not the logged in user
    // the profile belongs to the present base

    public function handle($request, Closure $next)
    { 
        //  dd($request->route()->parameters);
        if(!empty($request->route())){
            $base = $request->route()->parameter('basis');
            $profile = $request->route()->parameter('profile');
            $user = $request->route()->parameter('user'); //dd($user);

            if(!empty($base)){ //dd($base);
                if($base->_user->id != auth()->id()) return redirect('home');  

                $request->request->add(['base' => $base]);
            }
            
            if($profile != null){  //dd(auth()->id());
                if( $profile->_base->_user->id != auth()->id() ) return redirect('home');
                // if( !$base && $profile->_base->id != $base->id ) return redirect('home');

                $request->request->add(['profile' => $profile]);
            }                
        }
        return $next($request);
    }
}
