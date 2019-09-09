<?php

namespace App\Http\Controllers;

use Check;
use App\Menu;
use App\Order;
use App\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orderModel = new Order;
        $orderModel->setConnection(Check::connection());
        $orders = $orderModel->get();

        return view('order', compact('orders'));
    }

    public function create()
    {
        $categoryModel = new Category;
        $categoryModel->setConnection(Check::connection());
        $categories = $categoryModel->get();

        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $menus = $menuModel->get();

        return view('create_order', compact('menus', 'categories'));
    }

    public function category($name)
    {
        $categoryModel = new Category;
        $categoryModel->setConnection(Check::connection());
        $categories = $categoryModel->get();

        $menuModel = new Menu;
        $menuModel->setConnection(Check::connection());
        $kategori = $categoryModel->where('nama_kategori', $name)->first();
        $menus = $menuModel->where('id_kategori', $kategori->id)->paginate(8);

        return view('create_order', compact('menus', 'categories'));
    }
}
