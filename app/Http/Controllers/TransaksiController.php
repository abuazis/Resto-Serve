<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('transaksi');
    }

    public function order()
    {
        $orders = Order::latest()->get();
        $details = DetailOrder::latest()->get();

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
        $transaksi->total_kembali = $request->total - $request->bayar;
        $transaksi->save();

        $detailOrders = DetailOrder::where('id_order', $id);

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

        Alert::toast('Total Uang Kembali Rp.'.$request->total - $request->bayar,'success');

        return redirect()->back();
    }
}
