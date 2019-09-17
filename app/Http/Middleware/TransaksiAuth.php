<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class TransaksiAuth
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
        if ((Auth::user() &&  Auth::user()->id_level == 1) OR (Auth::user() &&  Auth::user()->id_level == 3)) {
            return $next($request);
        } else {
            return redirect()->back();
        }
    }
}
