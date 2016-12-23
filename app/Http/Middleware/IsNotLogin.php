<?php

namespace App\Http\Middleware;

use Closure;

class IsNotLogin
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
        if(session()->get('isLogin') == 1)
        {
            return redirect('/welcome');
        }
        return $next($request);
    }
}
