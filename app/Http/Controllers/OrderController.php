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

        $detailModel = new DetailOrder;
        $orderModel->setConnection(Check::connection());
        return view('order', compact('orders'));
    }
}
