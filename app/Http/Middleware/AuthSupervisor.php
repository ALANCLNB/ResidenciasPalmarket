<?php

namespace App\Http\Middleware;

use Closure;

class AuthSupervisor
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
        
        if (Auth::user()->rol == "2") {
            return $next($request);
           
        }else{
            return redirect('/dash');
        }
        
    }
}
