<?php

namespace App\Http\Middleware;

use Closure;

class AuthUsuario
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
        
        if (Auth::user()->rol == "1") {
            return $next($request);

        }else{
            return redirect('/dash');
        }

    }
}
