<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // 🟢 All orders
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // 🟡 Pending Orders
    public function pending()
    {
        $orders = Order::where('status', 'pending')->latest()->paginate(10);
        return view('admin.orders.pending', compact('orders'));
    }

    // 🟠 Shipped Orders
    public function shipped()
    {
        $orders = Order::where('status', 'shipped')->latest()->paginate(10);
        return view('admin.orders.shipped', compact('orders'));
    }

    // 🟢 Delivered Orders
    public function delivered()
    {
        $orders = Order::where('status', 'delivered')->latest()->paginate(10);
        return view('admin.orders.delivered', compact('orders'));
    }

    // 🔴 Cancelled Orders
    public function cancelled()
    {
        $orders = Order::where('status', 'cancelled')->latest()->paginate(10);
        return view('admin.orders.cancelled', compact('orders'));
    }

    // 🔵 Refund Orders
    public function refunds()
    {
        $orders = Order::where('status', 'refund')->latest()->paginate(10);
        return view('admin.orders.refunds', compact('orders'));
    }

    // 🧾 Show Single Order Details
    public function show($id)
    {
        $order = Order::with(['buyer', 'items.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 🔁 Update Status (optional)
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
