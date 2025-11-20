<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $sellerId = Auth::guard('seller')->id();
        $today = Carbon::today();

        $orders = Order::where('seller_id', $sellerId)
                       ->with('buyer')
                       ->orderBy('id', 'desc')
                       ->paginate(10);

        $totalOrdersToday = Order::where('seller_id', $sellerId)
                                 ->whereDate('created_at', $today)
                                 ->count();

        $pendingOrdersToday = Order::where('seller_id', $sellerId)
                                   ->where('status', 'pending')
                                   ->whereDate('created_at', $today)
                                   ->count();

        $inTransitOrdersToday = Order::where('seller_id', $sellerId)
                                     ->where('status', 'in_transit')
                                     ->whereDate('created_at', $today)
                                     ->count();

        $approvedOrdersToday = Order::where('seller_id', $sellerId)
                                    ->where('status', 'approved')
                                    ->whereDate('created_at', $today)
                                    ->count();

        return view('seller.orders.index', compact(
            'orders',
            'totalOrdersToday',
            'pendingOrdersToday',
            'inTransitOrdersToday',
            'approvedOrdersToday'
        ));
    }

    public function pending()
    {
        $orders = Order::where('seller_id', Auth::guard('seller')->id())
                        ->where('status', 'pending')
                        ->with('buyer')
                        ->orderBy('id', 'desc')
                        ->get();

        return view('seller.orders.pending', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('seller_id', Auth::guard('seller')->id())
                      ->with('buyer')
                      ->findOrFail($id);

        return view('seller.orders.show', compact('order'));
    }

    public function inTransit()
    {
        $orders = Order::where('seller_id', Auth::guard('seller')->id())
                       ->where('status', 'in_transit')
                       ->with('items.product')
                       ->orderBy('id', 'desc')
                       ->get();

        return view('seller.orders.in_transit', compact('orders'));
    }

    public function approved()
    {
        $orders = Order::where('seller_id', Auth::guard('seller')->id())
                       ->where('status', 'approved')
                       ->with('buyer')
                       ->orderBy('id', 'desc')
                       ->get();

        return view('seller.orders.approved', compact('orders'));
    }

   public function updateStatus($id, $status)
{
    $validStatuses = ['pending', 'approved', 'in_transit', 'delivered'];

    if (!in_array($status, $validStatuses)) {
        return redirect()->back()->with('error', 'Invalid status!');
    }

    $order = Order::where('seller_id', Auth::guard('seller')->id())->findOrFail($id);
    $order->status = $status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated to '.ucfirst($status).'!');
}

}
