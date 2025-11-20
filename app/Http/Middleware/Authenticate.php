<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {

            // Admin pages
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            // Seller pages
            if ($request->is('seller') || $request->is('seller/*')) {
                return route('seller.login');
            }

            // Customer pages
            if (
                $request->is('cart*') ||
                $request->is('checkout*') ||
                $request->is('wishlist*') ||
                $request->is('orders*') ||
                $request->is('profile*') ||
                $request->is('user/*')
            ) {
                return route('user.login');
            }

            // Default → Customer login
            return route('user.login');
        }

        return null;
    }
}
