<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('laporan');
    }

    public function monthly()
    {
        $last = Carbon::now()->subMonths(5);
        dd($last);
        // $datas = Order::whereMonth('created_at', '<=', date('m'))->count();
        // dd($datas);
    }
}
