<?php

namespace App\Http\Middleware;

use Closure;

/**
 * 此功能尚未开放
 */
class IsNotPublic
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
        return redirect()->back()->withErrors("此功能尚未开放，敬请期待");
    }
}
