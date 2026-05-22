<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function products()
    {
        return view('admin.products');
    }
    public function categories()
    {
        return view('admin.categories');
    }
    public function orders()
    {
        $orders = Order::with('items.product', 'user')
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }
}