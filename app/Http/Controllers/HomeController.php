<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** Write construct here.. */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $promos = DB::table('vMenu')->limit(3)->get();
        return view('home', compact('promos'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
