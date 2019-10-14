<?php

namespace App\Http\Controllers;

use Cart;
use Auth;
use Alert;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Category;
use App\Models\Discount;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Darryldecode\Cart\CartCondition;

class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $categories = Category::all();
        $menus = Menu::where('status_menu', 'Tersedia')->get();
        $quantity = Cart::session($user)->getTotalQuantity();

        return view('customer.index', compact('menus', 'categories', 'quantity'));
    }

    public function category($name)
    {
        $user = Auth::id();
        $categories = Category::all();
        $kategori = Category::where('nama_kategori', $name)->first();
        $menus = Menu::where('id_kategori', $kategori->id)->where('status_menu', 'Tersedia')->get();
        $quantity = Cart::session($user)->getTotalQuantity();

        return view('customer.index', compact('menus', 'categories', 'quantity'));
    }

    public function cart()
    {
        $user = Auth::id();
        $discount = Cart::session($user)->getCondition('discount');
        $items = Cart::session($user)->getContent();
        $total = Cart::session($user)->getTotal();
        $quantity = Cart::session($user)->getTotalQuantity();

        return view('customer.cart', compact('items', 'total', 'quantity', 'discount'));
    }

    public function discount(Request $request)
    {
        $this->validate($request, [
            'diskon' => 'exists:discounts,kode|size:8'
        ]);

        $user = Auth::id();
        $checkCode = Discount::where('kode', $request->diskon)->where('status', 'valid')->first();
        if ($checkCode) {
            $condition = new CartCondition([
                'name' => 'discount',
                'type' => 'discount',
                'target' => 'total',
                'value' => '-' . $checkCode->diskon
            ]);

            Cart::session($user)->condition($condition);
            $code = Discount::find($checkCode->id);
            $code->status = 'invalid';
            $code->save();

            Alert::toast('Diskon Berhasil Digunakan','success');
            return redirect()->back();

        } else {
            Alert::toast('Diskon Tidak Valid','warning');
            return redirect()->back();
        }
    }

    public function checkout(Request $request)
    {
        $user = Auth::id();
        $total = Cart::session($user)->getTotal();

        $this->validate($request, [
            'nama' => 'required|max:30|min:3',
            'alamat' => 'min:5',
        ]);

        $key = Str::random(8);
        while (Order::where('id', $key)->exists()) {
            $key = Str::random(8);
        }

        $order = new Order;
        $order->id = strtoupper($key);
        $order->id_user = Auth::id();
        $order->nama_pelanggan = $request->nama;
        $order->alamat = $request->alamat;
        $order->waktu_order = Carbon::now()->format('H:i:s').' WIB';
        $order->status_order = 'Bayar Ditempat';
        $order->total_pembayaran = $total;
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
        Cart::clearCartConditions();
        Alert::toast('Order Berhasil, Pengiriman Segera Dilakukan','success');

        return redirect('/customer/order');
    }

    public function order()
    {
        $user = Auth::id();
        $quantity = Cart::session($user)->getTotalQuantity();

        $orders = Order::where('id_user', Auth::id())->latest()->get();

        return view('customer.order', compact('quantity', 'orders'));
    }
}
