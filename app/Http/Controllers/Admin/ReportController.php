<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Admin\InHouseProduct;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    // 🔹 SALES REPORT
    public function sales()
    {
        // ✅ Total sales (delivered orders)
        $totalSales = Order::where('status', 'delivered')->sum('total_amount');

        // ✅ Today's sales
        $todaySales = Order::whereDate('created_at', Carbon::today())->sum('total_amount');

        // ✅ Monthly sales
        $monthlySales = Order::select(
                DB::raw('MONTHNAME(created_at) as month'),
                DB::raw('SUM(total_amount) as total_amount')
            )
            ->where('status', 'delivered')
            ->groupBy('month')
            ->orderBy(DB::raw('MIN(created_at)'))
            ->pluck('total_amount', 'month');

        return view('admin.reports.sales', compact('totalSales', 'todaySales', 'monthlySales'));
    }

    // 🔹 PRODUCT REPORT
    public function products()
    {
        $topProducts = InHouseProduct::withCount('orders')
            ->orderByDesc('orders_count')
            ->take(10)
            ->get();

        $lowStock = InHouseProduct::where('stock', '<', 10)->get();

        return view('admin.reports.products', compact('topProducts', 'lowStock'));
    }

    // 🔹 ORDER REPORT
    public function orders()
    {
        $totalOrders = Order::count();
        $pending = Order::where('status', 'pending')->count();
        $shipped = Order::where('status', 'shipped')->count();
        $delivered = Order::where('status', 'delivered')->count();
        $cancelled = Order::where('status', 'cancelled')->count();

        $orderStats = [
            'Pending' => $pending,
            'Shipped' => $shipped,
            'Delivered' => $delivered,
            'Cancelled' => $cancelled,
        ];

        return view('admin.reports.orders', compact('totalOrders', 'orderStats'));
    }
}
