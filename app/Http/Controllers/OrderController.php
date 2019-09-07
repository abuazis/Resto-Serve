<?php

namespace App\Http\Controllers;

use Check;
use App\Order;
use App\DetailOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orderModel = new Order;
        $orderModel->setConnection(Check::connection());
        $orders = $orderModel->get();

        // $detailOrder = new DetailOrder;
        // $detailOrder->setConnection(Check::connection());
        // foreach($orders as $order) {
        //     $orderId = $order->id;
        // }
        // $detailOrder->where()
        // $detailOrder->menu->gambar;

        return view('order', compact('orders'));
    }
}
