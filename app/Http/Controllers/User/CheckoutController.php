<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Address;
use App\Models\User\Order;
use App\Models\User\Cart;
use App\Models\User\Coupon;
use App\Models\User\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    // 🛒 Show checkout page
    public function index()
    {
        $userId = Auth::id();

        // User DB
        $addresses = Address::on('mysql_user')
            ->where('user_id', $userId)
            ->get();

        // ---------------------------
        // BUY NOW MODE
        // ---------------------------
        if (session()->has('buy_now')) {

            $buyNow = session('buy_now');

            $cartItems = collect([
                (object)[
                    'product' => \App\Models\Seller\Product::on('mysql')->find($buyNow['product_id']),
                    'quantity' => $buyNow['quantity']
                ]
            ]);

            $total = $buyNow['subtotal'];
        }

        // ---------------------------
        // NORMAL CART MODE
        // ---------------------------
        else {

            $cartItems = Cart::on('mysql_user')
                ->where('user_id', $userId)
                ->get()
                ->map(function ($item) {

                    // Seller DB products
                    $item->product = \App\Models\Seller\Product::on('mysql')->find($item->product_id);
                    return $item;

                });

            $total = $cartItems->sum(fn ($item) => $item->product?->price * $item->quantity);
        }

        $final_total = session('final_total', $total);

        return view('user.checkout', compact(
            'addresses',
            'cartItems',
            'total',
            'final_total'
        ));
    }

    // 🧾 Place Order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address_id' => 'required',
            'total'      => 'required|numeric',
        ]);

        $userId = Auth::id();
        $subtotal = $request->total;
        $discount = session('discount', 0);
        $finalTotal = session('final_total', $subtotal);

        // FETCH CART ITEMS (User DB -> Seller Product DB)
        $cartItems = Cart::on('mysql_user')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($item) {
                $item->product = \App\Models\Seller\Product::on('mysql')->find($item->product_id);
                return $item;
            });

        // CREATE ORDER (User DB)
        $order = Order::on('mysql_user')->create([
            'user_id'        => $userId,
            'address_id'     => $request->address_id,
            'total'          => $subtotal,
            'promo_code'     => session('promo_code'),
            'discount'       => $discount,
            'final_total'    => $finalTotal,
            'payment_method' => $request->payment_method ?? 'COD',
            'payment_status' => 'pending',
            'status'         => 'pending',
        ]);

        // ADD ORDER ITEMS
        foreach ($cartItems as $item) {
            OrderItem::on('mysql_user')->create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // CLEAR CART
        Cart::on('mysql_user')->where('user_id', $userId)->delete();

        session()->forget(['buy_now', 'final_total', 'discount', 'promo_code']);
        session(['checkout_order_id' => $order->id]);

        return redirect()->route('payment.page');
    }

    // 💳 Payment page
    public function payment(Request $request)
    {
        $final_total = session('final_total', session('checkout_subtotal', $request->total));
        return view('user.payment', compact('final_total'));
    }

    // 🎟️ Apply Promo Code
    public function applyPromo(Request $request)
    {
        $request->validate([
            'code'  => 'required|string',
            'total' => 'required|numeric'
        ]);

        $coupon = Coupon::on('mysql_user')->where('code', $request->code)->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid promo code']);
        }

        if ($coupon->expiry_date && Carbon::now()->gt($coupon->expiry_date)) {
            return response()->json(['success' => false, 'message' => 'Promo code expired']);
        }

        if ($request->total < $coupon->min_order_amount) {
            return response()->json(['success' => false, 'message' => 'Minimum order amount not met']);
        }

        $discount = $coupon->type === 'percent'
            ? ($request->total * ($coupon->value / 100))
            : $coupon->value;

        $newTotal = $request->total - $discount;

        session([
            'promo_code'  => $coupon->code,
            'discount'    => $discount,
            'final_total' => $newTotal
        ]);

        return response()->json([
            'success'     => true,
            'message'     => "Promo applied! You saved ₹{$discount}",
            'discount'    => $discount,
            'final_total' => $newTotal
        ]);
    }

    // ⚡ Buy Now
    public function buyNow($id)
    {
        $product = \App\Models\Seller\Product::on('mysql')->findOrFail($id);

        session([
            'buy_now' => [
                'product_id' => $product->id,
                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => 1,
                'subtotal'   => $product->price,
            ]
        ]);

        return redirect()->route('checkout.index');
    }
}
