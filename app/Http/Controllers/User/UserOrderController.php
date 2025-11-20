<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Order;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderByDesc('id')
            ->get();

        return view('user.orders', compact('orders'));
    }

    public function track($id)
{
    // load order + its status history
    $order = Order::on('mysql_user')
        ->with('statusHistories')
        ->findOrFail($id);

    // define stages
    $stages = ['Ordered', 'Packed', 'Shipped', 'Out for Delivery', 'Delivered'];

    // create a status-to-timestamp map
    $historyMap = $order->statusHistories->mapWithKeys(function ($history) {
        return [$history->status => $history->created_at->format('d M Y, h:i A')];
    })->toArray();

    // detect current stage
    $currentIndex = array_search($order->status, $stages);
    if ($currentIndex === false) $currentIndex = -1;

    return view('user.track_steps', compact('order', 'stages', 'historyMap', 'currentIndex'));
}

}
