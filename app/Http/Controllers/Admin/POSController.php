<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class POSController extends Controller
{
    /**
     * Display POS page
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);
        $cart = session()->get('cart', []);

        // Calculate total for all cart items
        $total = 0;
        foreach ($cart as $seller_items) {
            foreach ($seller_items as $item) {
                $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
            }
        }

        return view('admin.pos.index', compact('products', 'cart', 'total'));
    }

    /**
     * Add product to cart
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $seller_id = $product->seller_id ?? 0; // fallback if seller not set
        $price = $product->price ?? 0;
        $image = $product->image ?? 'no-image.png';

        // Initialize seller group if not exists
        if (!isset($cart[$seller_id])) {
            $cart[$seller_id] = [];
        }

        // Add or increment product
        if (isset($cart[$seller_id][$id])) {
            $cart[$seller_id][$id]['quantity']++;
        } else {
            $cart[$seller_id][$id] = [
                'name' => $product->name,
                'price' => $price,
                'image' => $image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('admin.pos.index')->with('success', 'Product added to cart!');
    }

    /**
     * Remove product from cart
     */
    public function removeFromCart($seller_id, $product_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$seller_id][$product_id])) {
            unset($cart[$seller_id][$product_id]);

            // Remove seller if empty
            if (empty($cart[$seller_id])) {
                unset($cart[$seller_id]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('admin.pos.index')->with('success', 'Item removed from cart.');
    }

    /**
     * Checkout all cart items
     */
    public function checkout()
    {
        session()->forget('cart');
        return redirect()->route('admin.pos.index')->with('success', 'Checkout successful!');
    }
}
