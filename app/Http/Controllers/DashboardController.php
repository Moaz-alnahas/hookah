<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // عدد الطلبات
        $ordersCount = Order::count();

        // عدد المستخدمين
        $usersCount = User::count();

        // إجمالي الأرباح
        $totalEarnings = Order::sum('total_price');

        // قائمة أسماء المستخدمين
        $users = User::all(); // أو ->pluck('name') إذا بدك بس الأسماء

        $topUsers = User::with(['orders.items.product'])
    ->withCount('orders')
    ->orderBy('orders_count', 'desc')
    ->take(5)
    ->get();

        return view('dashboard.home', compact('ordersCount', 'usersCount', 'totalEarnings', 'users', 'topUsers'));
    }   
}


