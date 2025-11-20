<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Order;
use Illuminate\Support\Facades\Schema;

class UserOrderTrackingController extends Controller
{
    /**
     * Get live location of an order
     */
    public function getLocation($id)
    {
        // Order must come from user database
        $order = Order::on('mysql_user')->findOrFail($id);

        // Check if location columns exist in DB
        $hasLocation = (
            Schema::connection('mysql_user')->hasColumn('orders', 'latitude') &&
            Schema::connection('mysql_user')->hasColumn('orders', 'longitude')
        );

        if (!$hasLocation) {
            return response()->json([
                'error' => 'Location tracking not enabled for this order.'
            ], 400);
        }

        if (is_null($order->latitude) || is_null($order->longitude)) {
            return response()->json([
                'error' => 'Coordinates not available for this order.'
            ], 400);
        }

        return response()->json([
            'latitude' => $order->latitude,
            'longitude' => $order->longitude,
        ]);
    }

    /**
     * Status Timeline (Meesho-like)
     */
    public function getStatus($id)
    {
        // Fetch from user DB
        $order = Order::on('mysql_user')
            ->with('statusHistories')
            ->findOrFail($id);

        // Build timeline
        $history = $order->statusHistories->map(function ($h) {
            return [
                'status' => $h->status,
                'time'   => $h->created_at->format('d M Y, h:i A')
            ];
        });

        return response()->json([
            'order_id' => $order->id,
            'current_status' => $order->status ?? 'pending',
            'timeline' => $history
        ]);
    }
}
