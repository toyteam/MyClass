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
                return redirect()->back()->withErrors('很抱歉，您没有权限访问该页面');
        }
        return $next($request);
    }

    private function isnotAdmin()
    {
        $role_id = session()->get('user_info')->user_role_id;
        if($role_id != 1)
        {
            return true;
        }
        return false;
    }
}
