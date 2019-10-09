<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Alert;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('transaksi');
    }

    public function order(Request $request)
    {
        if($request->has('cari')) {
            $orders = DB::table('vOrderKasir')->where('nama_pelanggan', 'LIKE', '%'.$request->cari.'%')->latest()->get();
            $details = DetailOrder::latest()->get();
        } else {
            $orders = DB::table('vOrderKasir')->where('status_order', 'Belum Dibayar')->whereDate('created_at', Carbon::now())->latest()->get();
            $details = DetailOrder::latest()->get();
        }

        return view('order_transaksi', compact('orders', 'details'));
    }

    public function bayar(Request $request, $id)
    {
        $this->validate($request, [
            'bayar' => 'required',
        ]);

        $transaksi = new Transaction;
        $transaksi->id_user = Auth::id();
        $transaksi->id_order = $id;
        $transaksi->total_bayar = $request->total;
        $transaksi->uang_dibayar = $request->bayar;
        $transaksi->total_kembali = $request->bayar - $request->total;
        $transaksi->save();

        $detailOrders = DetailOrder::where('id_order', $id)->get();

        foreach($detailOrders as $detailOrder) {
            $transaksi->detail_transaction()->saveMany([
                new DetailTransaction([
                    'id_transaksi' => $transaksi->id,
                    'id_menu' => $detailOrder->id_menu,
                    'jumlah' => $detailOrder->jumlah,
                    'sub_total' => $detailOrder->menu->harga * $detailOrder->jumlah,
                ])
            ]);
        }

        $order = Order::find($id);
        $order->status_order = 'Sudah Dibayar';
        $order->save();

        Alert::toast('Total Uang Kembali Rp. '.number_format($request->total - $request->bayar, 0, ',', '.'),'success');

        return redirect()->back();
    }

    public function history()
    {
        $histories = Transaction::all();

        return view('transaksi', compact('histories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bayar' => 'required',
        ]);

        $history = Transaction::find($id);
        $history->uang_dibayar = $request->bayar;
        $history->total_kembali = $history->total_bayar - $history->uang_dibayar;
        $history->save();

        Alert::toast('Struk Berhasil Diedit','success');
        return redirect()->back();
    }

    public function receipt($id)
    {
        $date = Carbon::now()->format('d/M/Y');
        $time = Carbon::now()->format('H:i:s').' WIB';

        $receipts = DetailTransaction::where('id_transaksi', $id)->get();

        $pdf = PDF::loadView('exports/struk', compact('date', 'time', 'receipts'))->setPaper([0,0,204,650]);
        return $pdf->download('struk_order');
    }

    /* public function diskon(Request $request)
    {
        $this->validate($request, [
            'diskon' => 'exist:discounts,diskon|size:8'
        ]);

        $discount = Discount::where('kode', $request->diskon)->where('status', 'valid')->first();

        $order = Order::find($request->id);
        Order::where('id', $request->id)->update(['total_pembayaran' => ($order['total_pembayaran'] * 20) / 100]);

        return redirect()->back();
    } */
}
