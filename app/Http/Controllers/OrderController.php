<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function show(Order $order)
    {
        return view('admin.order.show', [
            'order' => $order
        ]);
    }
}
