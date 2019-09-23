<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class DashboardAuth
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
        $admin = Auth::user()->id_level == 1;
        $waiter = Auth::user()->id_level == 2;
        $kasir = Auth::user()->id_level == 3;
        $owner = Auth::user()->id_level == 4;

        if ($admin || $waiter || $kasir || $owner) {
            return $next($request);
        } else {
            return redirect('/customer/menu');
        }
    }
}
