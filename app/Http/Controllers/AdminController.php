<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Brand;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $recentOrders = Order::latest()->take(5)->get();
        $lowStockProducts = Product::where('stock', '<', 5)->get();
        
        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'recentOrders', 'lowStockProducts'));
    }
}