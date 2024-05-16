<?php

namespace App\Http\Middleware;

use Closure;
use StaticVariable;

class RedirectIfAuthenticated
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
        if ($request->session()->get('Auth', null) !== null) {
            $jemaat = session()->get('Auth', null);
            if ($jemaat->pelayanGereja) {
                if ($jemaat->pelayanGereja->peran === "Pendeta") {
                    return redirect()->route('pendeta.index');
                }
            } else {
                return redirect()->route('home.index');
            }
        } else {
            StaticVariable::$user = null;
        }
        return $next($request);
    }
}

