<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Seller;

class SellerAuthController extends Controller
{
    /**
     * Show Login Form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle Login (Email + Password)
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('seller')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('seller.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->withInput();
    }

    /**
     * Show Registration / Start Selling Form
     */
    public function showStartSellingForm()
    {
        return view('seller.start-selling');
    }

    /**
     * Handle Registration
     */
    public function startSelling(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:sellers,email',
            'password' => 'required|min:8|confirmed',
            'whatsapp' => 'sometimes|boolean'
        ]);

        $seller = Seller::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'whatsapp_updates' => $request->whatsapp ?? false,
            'is_verified'      => true
        ]);

        Auth::guard('seller')->login($seller);

        return redirect()->route('seller.dashboard')
                         ->with('success', 'Registration successful! Welcome to PGMS.');
    }

    /**
     * Show Forgot Password Form
     */
    public function showForgotPasswordForm()
    {
        return view('seller.auth.forgot-password');
    }

    /**
     * Send Password Reset Link
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:sellers,email',
        ]);

        \Password::broker('sellers')->sendResetLink($request->only('email'));

        return back()->with('success', 'Password reset link sent to your email.');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('seller.login')->with('success', 'Logged out successfully!');
    }
}
