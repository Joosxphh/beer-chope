<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::all();
        $orders = Order::all();
        $users = User::all();

        $usersLatest = User::latest()->take(5)->get();
        $ordersLatest = Order::latest()->take(5)->get();
        $paidOrdersCount = Order::where('status', 'paid')->count();
        $totalPaidOrders = Order::whereIn('status', ['paid', 'send'])->sum('total_price');
        return view('dashboard', compact('products', 'orders', 'users', 'usersLatest', 'ordersLatest', 'paidOrdersCount', 'totalPaidOrders'));    }
}
