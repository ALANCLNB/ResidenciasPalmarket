<?php

namespace App\Http\Middleware;

use Closure;

class AuthCliente
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
        
        if (Auth::user()->rol == "3") {
            return $next($request);

        }else{
            return redirect('/dash');
        }

    }
}
