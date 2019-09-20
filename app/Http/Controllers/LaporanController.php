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
        $months = [
            Carbon::now()->subMonths(5)->format('F'),
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
        ];
        $bulan  = json_encode($months);

        return view('laporan', compact('bulan'));
    }
}
