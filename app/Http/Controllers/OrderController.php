<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\Menu;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

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
        $menus = Menu::all();

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
        $menus = Menu::where('id_kategori', $kategori->id)->get();

        return view('create_order', compact('menus', 'categories'));
    }
}
