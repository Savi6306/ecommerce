<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Optional test route to check DB connection
    public function testDB()
    {
        try {
            $name = DB::connection()->getDatabaseName();
            return "Connected to DB: {$name}";
        } catch (\Exception $e) {
            return "DB Error: " . $e->getMessage();
        }
    }

    public function register(Request $request)
    {
        // Validate request
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:customers,email',
            'phone'     => 'nullable|string|max:11',
            'gender'    => 'required|in:male,female,other',
            'password'  => 'required|string|min:4|confirmed',
        ]);

        // Save user
        $customer = Customer::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'gender'    => $request->gender,
            'password'  => Hash::make($request->password),
        ]);

        // ✅ Auto-login using 'customer' guard (important!)
        Auth::guard('customer')->login($customer);

        // Redirect to profile or home
        return redirect()->route('home')->with('success', 'Account created successfully!');
    }

    // Show Login Form
    public function showLoginForm()
    {
        return view('user.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        // ✅ Use 'customer' guard for login
        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // ✅ Proper logout for 'customer' guard
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Logged out successfully!');
    }
}