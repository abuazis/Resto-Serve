<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }

    public function index()
    {
        $jmlMenu = Menu::count();
        $jmlOrder = Order::whereMonth('created_at', Carbon::now()->startOfMonth())->count();
        $totalTransaksi = Transaction::whereMonth('created_at', Carbon::now()->startOfMonth())->sum('total_bayar');
        $month = Carbon::now()->subMonth()->format('F');

        return view('dashboard', compact('jmlMenu', 'jmlOrder', 'totalTransaksi', 'month'));
    }
}
