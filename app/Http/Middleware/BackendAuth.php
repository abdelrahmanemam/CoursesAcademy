<?php

namespace App\Http\Middleware;

use Closure;

class BackendAuth
{

    public function handle($request, Closure $next)
    {

        /**
         *
         * Check if Admin Authenticated ( Depends on backend Guard )
         * If not redirect to backend login route
         */
        if(auth('backend')->user()){

            return $next($request);
        }
        return redirect()->route('backend.login');

    }
}
