<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if($this->isnotAdmin())
        {
            return redirect()->back();
        }
        return $next($request);
    }

    private function isnotAdmin()
    {
        if(! session()->get('stu_info'))
        {
            return true;
        }
        return false;
    }
}
