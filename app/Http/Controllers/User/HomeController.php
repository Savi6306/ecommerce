<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Order;
use App\Models\User\Wishlist;
use App\Models\Seller\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    // Signup page load karne ke liye
    public function signup()
    {
        return view('user.signup'); 
        
    }


    //about us page
     public function about()
    {
        return view('user.about'); 
    }

    //Blog page
     public function blog()
    {
        return view('user.blog'); 
    }

    //Help & FAQ page
     public function FAQ()
    {
        return view('user.FAQ'); 
    }

     //Privacy Policy page
     public function privacy()
    {
        return view('user.privacy'); 
    }

     //Cart page
     public function cart()
    {
        return view('user.cart'); 
    }

     public function offers()
    {
        return view('user.offers'); 
    }

    public function bestsellers()
    {
        return view('user.bestsellers'); 
    }

        //Order page
    public function orders()
{
    // Logged-in user ke orders fetch karo with items and products
  $orders = Order::with('orderItems.product')
                   ->where('user_id', Auth::id())
                   ->orderBy('id', 'asc')  // ascending order ID
                   ->get();

    return view('user.orders', compact('orders'));
}

    
        //Wishlist page
public function addToWishlist($id)
{
    if (!Auth::check()) {
        return redirect()->route('user.login')->with('error', 'Please login first.');
    }

    $userId = Auth::id();

    // Check if product already in wishlist
    $exists = DB::table('wishlists')
        ->where('user_id', $userId)
        ->where('product_id', $id)
        ->exists();

    if ($exists) {
        return redirect('wishlist')->with('info', 'This product is already in your wishlist.');
    }

    // ✅ Add new wishlist entry automatically with logged in user
    DB::table('wishlists')->insert([
        'user_id' => $userId,
        'product_id' => $id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

return redirect('wishlist')->with('success', 'Product added to wishlist!');
}

    // ✅ Show wishlist
    public function wishlist()
{
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        $wishlistItems = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', '=', 'products.id')
            ->where('wishlists.user_id', $user->id)
            ->select('products.*')
            ->get();

        return view('user.wishlist', compact('wishlistItems'));
    }

    // ✅ Remove from wishlist
    public function removeFromWishlist($id)
    {
        $user = Auth::user();

        DB::table('wishlists')
            ->where('user_id', $user->id)
            ->where('product_id', $id)
            ->delete();

        return redirect()->route('wishlist')->with('success', 'Product removed from wishlist.');
    }

     public function terms()
    {
        return view('user.terms'); 
        
    }

     public function returns()
    {
        return view('user.returns'); 
        
    }

       public function shipping_info()
    {
        return view('user.shipping_info'); 
        
    }

    public function filterProducts(Request $request) {
    $query = \App\Models\Seller\Product::query();

    if($request->category){
        $query->where('category_id', $request->category);
    }

    if($request->price){
        if($request->price === '5000'){
            $query->where('price', '>=', 5000);
        } else {
            [$min, $max] = explode('-', $request->price);
            $query->whereBetween('price', [(int)$min, (int)$max]);
        }
    }

    if($request->size){
        $query->where('size', $request->size);
    }

    $products = $query->get();

    // Return HTML partial
    return view('user.filtered_products', compact('products'));
}

}
