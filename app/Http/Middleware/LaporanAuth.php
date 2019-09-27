<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LaporanAuth
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
        $admin = (Auth::user() &&  Auth::user()->id_level == 1);
        $waiter = (Auth::user() &&  Auth::user()->id_level == 2);
        $kasir = (Auth::user() &&  Auth::user()->id_level == 3);
        $owner = (Auth::user() &&  Auth::user()->id_level == 4);
        $pelanggan = (Auth::user() &&  Auth::user()->id_level == 5);

        if ($admin OR $waiter OR $kasir OR $owner) {
            return $next($request);
        } elseif($pelanggan) {
            return redirect()->back();
        }
    }
}
