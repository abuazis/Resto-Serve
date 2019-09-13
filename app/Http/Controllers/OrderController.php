<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use Alert;
use App\Menu;
use App\Order;
use App\Category;
use App\DetailOrder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('order', compact('orders'));
    }

    public function create()
    {
        $categories = Category::all();
        $menus = Menu::where('status_menu', 'Tersedia')->get();

        $user = Auth::id();
        $items = Cart::session($user)->getContent();
        $total = Cart::session($user)->getTotal();
        $quantity = Cart::session($user)->getTotalQuantity();

        return view('create_order', compact('menus', 'categories', 'items', 'total', 'quantity'));
    }

    public function category($name)
    {
        $categories = Category::all();

        $kategori = Category::where('nama_kategori', $name)->first();
        $menus = Menu::where('id_kategori', $kategori->id)
            ->where('status_menu', 'Tersedia')
            ->get();

        $user = Auth::id();
        $items = Cart::session($user)->getContent();
        $total = Cart::session($user)->getTotal();
        $quantity = Cart::session($user)->getTotalQuantity();

        return view('create_order', compact('menus', 'categories', 'items', 'total', 'quantity'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:30|min:3',
            'meja' => 'required',
            'deskripsi' => 'min:5',
        ]);

        $key = Str::random(8);
        while (Order::where('id', $key)->exists()) {
            $key = Str::random(8);
        }

        $order = new Order;
        $order->id = strtoupper($key);
        $order->id_user = Auth::id();
        $order->nama_pelanggan = $request->nama;
        $order->no_meja = $request->meja;
        $order->waktu_order = Carbon::now()->format('H:i:s').' WIB';
        $order->keterangan = $request->keterangan;
        $order->status_order = 'Belum Dibayar';
        $order->save();

        $items = Cart::session(Auth::id())->getContent();
        $request->request->add(['id_order' => $order->id]);

        foreach($items as $item) {
            $order->detail_order()->saveMany([
                new DetailOrder([
                    'id_menu' => $item->id,
                    'id_order' => $request->id_order,
                    'jumlah' => $item->quantity,
                    'harga' => $item->price,
                    'status_detail_order' => 'On Process',
                ])
            ]);
        }

        Cart::clear();
        Alert::toast('Order Baru Ditambahkan','success');

        return redirect('/order');
    }
}
