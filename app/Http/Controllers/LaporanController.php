<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;
use App\Charts\ReportChart;
use App\Exports\MonthlyReport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('laporan');
    }

    public function index()
    {
        $months = [
            Carbon::now()->subMonths(4)->format('F'),
            Carbon::now()->subMonths(3)->format('F'),
            Carbon::now()->subMonths(2)->format('F'),
            Carbon::now()->subMonths(1)->format('F'),
            Carbon::now()->subMonths(0)->format('F'),
        ];

        $dataOrder = [
            Order::whereMonth('created_at', Carbon::now()->subMonths(4)->format('m'))->count(),
            Order::whereMonth('created_at', Carbon::now()->subMonths(3)->format('m'))->count(),
            Order::whereMonth('created_at', Carbon::now()->subMonths(2)->format('m'))->count(),
            Order::whereMonth('created_at', Carbon::now()->subMonths(1)->format('m'))->count(),
            Order::whereMonth('created_at', Carbon::now()->subMonths(0)->format('m'))->count(),
        ];

        $backgroundColor = [
            'rgba(255, 99, 132, 0.2)',
        ];

        $color = [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ];

        $chart = new ReportChart;
        $chart->labels($months);
        $chart->dataset('Total Order', 'line', $dataOrder)->color($color)->backgroundColor($backgroundColor);
        return view('laporan', compact('chart'));
    }

    public function download()
    {
        $jauh = Order::whereMonth('created_at', Carbon::now()->startOfMonth())->where('alamat', null)->sum('total_pembayaran');
        $dekat = Order::whereMonth('created_at', Carbon::now()->startOfMonth())->where('alamat', '!=', null)->sum('total_pembayaran');
        $total = $jauh + $dekat;

        $pdf = PDF::loadView('exports/report', compact('jauh', 'dekat', 'total'));
        return $pdf->download('report-monthly');
    }

    public function export()
    {
        return Excel::download(new MonthlyReport, 'report-monthly.xlsx');
    }
}
