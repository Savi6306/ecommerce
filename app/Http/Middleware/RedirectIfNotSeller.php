<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotSeller
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('seller.login')->with('error', 'Please login to access seller dashboard.');
        }

        // Check if user has seller role (adjust this based on your user model)
        $user = Auth::user();
        
        // Option 1: If you have an 'is_seller' column
        if (!$user->is_seller) {
            return redirect('/')->with('error', 'Access denied. Seller account required.');
        }

        // Option 2: If you have a 'role' column
        // if ($user->role !== 'seller') {
        //     return redirect('/')->with('error', 'Access denied. Seller account required.');
        // }

        // Option 3: If you use role-based permissions (like spatie/laravel-permission)
        // if (!$user->hasRole('seller')) {
        //     return redirect('/')->with('error', 'Access denied. Seller account required.');
        // }

        return $next($request);
    }
}