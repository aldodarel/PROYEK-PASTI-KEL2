<?php

namespace App\Http\Middleware;

use Closure;
use StaticVariable;

class BeforeAuth
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
                if ($jemaat->pelayanGereja->peran === "Tata Usaha") {
                    return redirect()->route('tatausaha.index');
                }
                if ($jemaat->pelayanGereja->peran === "Penatua") {
                    return redirect()->route('penatua.index');
                }
                if ($jemaat->pelayanGereja->peran === "Sekretaris Jemaat") {
                    return redirect()->route('sekretaris.index');
                }
                if ($jemaat->pelayanGereja->peran === "Bendahara Jemaat") {
                    return redirect()->route('bendahara.index');
                }
                if ($jemaat) {
                    return redirect()->route('jemaat.index');
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
