<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller\Product;
use App\Models\User\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // Always use customer guard
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('user.login');
        }

        $userId = Auth::guard('customer')->id();

        $cartItems = Cart::where('user_id', $userId)
            ->with('product')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        return view('user.cart', compact('cartItems', 'subtotal'));
    }

    public function addToCart($id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('user.login');
        }

        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $userId = Auth::guard('customer')->id();

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    public function remove($id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('user.login');
        }

        $userId = Auth::guard('customer')->id();

        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }

        $remainingItems = Cart::where('user_id', $userId)->count();

        if ($remainingItems == 0) {
            return redirect()->route('cart')->with('success', 'Your cart is empty.');
        }

        return redirect()->route('cart')->with('success', 'Item removed successfully.');
    }

    public function updateQuantity(Request $request, $id)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['error' => 'Not logged in'], 401);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::guard('customer')->id();

        $cartItem = Cart::where('id', $id)
                        ->where('user_id', $userId)
                        ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $cartItems = Cart::where('user_id', $userId)
            ->with('product')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product ? $item->product->price * $item->quantity : 0;
        });

        return response()->json([
            'success'   => true,
            'quantity'  => $cartItem->quantity,
            'item_total'=> $cartItem->product ? $cartItem->product->price * $cartItem->quantity : 0,
            'subtotal'  => $subtotal
        ]);
    }
}
