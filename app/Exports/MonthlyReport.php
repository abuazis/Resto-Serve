<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonthlyReport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $jauh = Order::whereMonth('created_at', Carbon::now()->startOfMonth())->where('alamat', null)->sum('total_pembayaran');
        $dekat = Order::whereMonth('created_at', Carbon::now()->startOfMonth())->where('alamat', '!=', null)->sum('total_pembayaran');
        $total = $jauh + $dekat;
        $transaksis = Transaction::all();
        $orders = Order::all();
        $carbon = new Carbon;

        return view('exports.excel', compact('orders', 'carbon', 'jauh', 'dekat', 'total', 'transaksis'));
    }
}
