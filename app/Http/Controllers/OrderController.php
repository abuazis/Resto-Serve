<?php

namespace App\Http\Controllers;

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

        return view('create_order', compact('menus', 'categories'));
    }

    public function category($name)
    {
        $categories = Category::all();

        $kategori = Category::where('nama_kategori', $name)->first();
        $menus = Menu::where('id_kategori', $kategori->id)->get();

        return view('create_order', compact('menus', 'categories'));
    }
}
