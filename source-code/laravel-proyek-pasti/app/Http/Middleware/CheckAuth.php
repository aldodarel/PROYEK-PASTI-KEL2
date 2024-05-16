<?php

namespace App\Http\Middleware;

use Closure;
use StaticVariable;

class CheckAuth
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
        if ($request->session()->get('Auth', null) === null) {
            return redirect()->route('auth.login');
        } else {
            StaticVariable::$user = $request->session()->get('Auth', null);
        }
        return $next($request);
    }
}
