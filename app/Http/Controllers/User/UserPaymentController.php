<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User\Order;
use App\Models\User\Payment;
use App\Models\User\Address;
use Illuminate\Support\Facades\Schema;

class UserPaymentController extends Controller
{
    // ✅ Show Payment Page
    public function showPayment()
{
    $orderId = session('checkout_order_id');

    if (!$orderId) {
        return redirect()->route('checkout.index')->with('error', 'Session expired.');
    }

    $order = Order::on('mysql_user')->find($orderId);

    if (!$order) {
        return redirect()->route('checkout.index')->with('error', 'Order not found.');
    }

    return view('user.payment', [
        'order' => $order,
        'final_total' => $order->final_total
    ]);
}


    // ✅ Process Payment
    public function processPayment(Request $request)
    {
        try {
            Log::info('PROCESS PAYMENT STARTED', $request->all());

            $request->validate([
                'method'   => 'required|string',
                'details'  => 'nullable|string',
                'amount'   => 'required|numeric',
                'order_id' => 'required|integer',
            ]);

            $userId = Auth::id();

            // 🔥 Manual order validation (two DB setup)
            $order = Order::on('mysql_user')
                ->where('id', $request->order_id)
                ->where('user_id', $userId)
                ->first();

            if (!$order) {
                return back()->with('error', 'Invalid order reference.');
            }

            // 🔥 Save Payment
            $payment = Payment::on('mysql_user')->create([
                'user_id' => $userId,
                'method'  => $request->method,
                'details' => $request->details ?? 'N/A',
                'amount'  => $request->amount,
                'status'  => 'success',
            ]);

            Log::info('PAYMENT SAVED', ['payment_id' => $payment->id]);

            // 🔥 Prepare update data
            $updateData = [
                'payment_method' => $request->method,
                'payment_status' => 'Paid',
            ];

            // ❗ Only update "status" column if table has that column
            if (Schema::connection('mysql_user')->hasColumn('orders', 'status')) {
                $updateData['status'] = $request->method === 'COD' ? 'Pending' : 'Paid';
            }

            // 🔥 Update order safely
            $order->update($updateData);

            Log::info('ORDER UPDATED', ['order_id' => $order->id]);

            // Clear session
            session()->forget([
                'final_total', 
                'promo_code', 
                'discount', 
                'buy_now', 
                'checkout_order_id'
            ]);

            return redirect()
                ->route('track.order', ['id' => $order->id])
                ->with('success', 'Payment successful! Tracking your order now.');

        } catch (\Exception $e) {
            Log::error('PAYMENT ERROR', ['message' => $e->getMessage()]);
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
