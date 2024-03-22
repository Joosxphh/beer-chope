<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::paginate(15);

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }
    public function show(Order $order): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.order.show', [
            'order' => $order
        ]);
    }

    public function validateOrder(Order $order): RedirectResponse
    {
        $order->update(['status' => 'sends']);

        return redirect()->route('order.show', $order);
    }
}
