<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Seller;
use App\Models\Admin\Product;          // In-house products
use App\Models\Admin\VendorProduct;    // Vendor products
use App\Models\Admin\Order;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // ----------------------------
        // 1️⃣ Total Counts
        // ----------------------------
        $totalUsers = User::count();
        $totalSellers = Seller::count();
        $totalProducts = Product::count() + VendorProduct::count();
        $totalOrders = Order::count();

        // ----------------------------
        // 2️⃣ Monthly Sales Chart
        // ----------------------------
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $months = [];
        $totals = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date("M", mktime(0, 0, 0, $i, 1));
            $totals[] = $salesData[$i] ?? 0; // Fill missing months with 0
        }

        // ----------------------------
        // 3️⃣ Top 5 Selling Products
        // ----------------------------
        $topProducts = Order::select('product_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->with('product') // eager load product details
            ->get();

        // ----------------------------
        // 4️⃣ Recent Orders
        // ----------------------------
        $recentOrders = Order::latest()->limit(5)->with('user')->get();

        // ----------------------------
        // 5️⃣ Low Stock Products (Vendor + In-house)
        // ----------------------------
        $lowStockProducts = VendorProduct::where('stock', '<=', 5)->get()
                                ->merge(Product::where('stock', '<=', 5)->get());

        // ----------------------------
        // 6️⃣ Return Dashboard View
        // ----------------------------
        return view('admin.admindashboard', compact(
            'totalUsers',
            'totalSellers',
            'totalProducts',
            'totalOrders',
            'months',
            'totals',
            'topProducts',
            'recentOrders',
            'lowStockProducts'
        ));
    }

    // Optional: Search feature
    public function search(Request $request)
    {
        $query = $request->input('q');

        $users = User::where('name', 'like', "%{$query}%")->get();
        $sellers = Seller::where('name', 'like', "%{$query}%")->get();
        $products = Product::where('name', 'like', "%{$query}%")->get();

        return view('admin.search_results', compact('users','sellers','products','query'));
    }
}
