<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\User\Order;
use App\Models\Seller\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Seller Dashboard
     */
    public function index()
    {
        $sellerId = Auth::guard('seller')->id();

        $totalProducts = Product::where('seller_id', $sellerId)
            ->where('is_active', true)
            ->count();

        $totalOrders = Order::where('seller_id', $sellerId)->count();

        $pendingOrders = Order::where('seller_id', $sellerId)
            ->where('status', 'pending')
            ->count();

        return view('seller.dashboard.index', compact('totalProducts', 'totalOrders', 'pendingOrders'));
    }

    /**
     * Analytics Page
     */
    public function analytics()
    {
        $sellerId = Auth::guard('seller')->id();

        // 📊 Monthly Sales Data
        $monthlySalesRaw = DB::table('orders')
            ->selectRaw('MONTH(created_at) as month, COALESCE(SUM(total_amount), 0) as total')
            ->where('seller_id', $sellerId)
            ->whereYear('created_at', date('Y'))
            ->whereIn('status', ['approved', 'in_transit', 'delivered'])
            ->groupBy('month')
            ->pluck('total', 'month');

        $salesData = [];
        for ($m = 1; $m <= 12; $m++) {
            $salesData[] = $monthlySalesRaw[$m] ?? 0;
        }

        // 🏆 Top 5 Products
        $topProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.seller_id', $sellerId)
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('products.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        // 🗂️ Category-wise Sales (✅ Fixed)
        $categorySales = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.seller_id', $sellerId)
            ->select('categories.name as category', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('categories.name')
            ->orderByDesc('total_sold')
            ->get();

        return view('seller.analytics.analytics', compact('salesData', 'topProducts', 'categorySales'));
    }
}
