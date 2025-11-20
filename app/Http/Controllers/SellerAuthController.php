<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SellerAuthController extends Controller
{
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route('seller.dashboard');
        }
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        // Simple validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Manual authentication
        $user = User::where('email', $request->email)->first();

        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('seller.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
