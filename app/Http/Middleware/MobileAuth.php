<?php

namespace App\Http\Middleware;

use Closure;

class MobileAuth
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

        if(auth('api')->user()){

            return $next($request);
        }
        return response(['message' => 'You Must Login!'], 401);
    }
}
