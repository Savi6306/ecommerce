<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // ❌ कोई auto redirect नहीं होगा
        // Seller logged in हो, Customer login page पर आए — कोई redirect नहीं
        // Customer logged in हो, Seller login page पर आए — कोई redirect नहीं

        return $next($request);
    }
}
