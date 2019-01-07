<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class OuterAdminLogin
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
        if (!Session::exists('outerUser')) {
            return redirect('/outer/login');
        }
        $user = Session::get('outerUser');
        return $next($request);
    }
}
