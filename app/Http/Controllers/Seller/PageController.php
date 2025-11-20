<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Seller Dashboard / Index
    public function index()
    {
        return view('seller.index');
    }

    // How it Works Page
    public function howToWork()
    {
        return view('seller.how-to-work');
    }

    // Pricing & Commission Page
    public function pricingCommission()
    {
        return view('seller.pricing-commission');
    }

    // Shipping & Returns Page
    public function shippingReturns()
    {
        return view('seller.shipping-returns');
    }

    // Login Page
    public function login()
    {
        return view('seller.login');
    }

    // Start Selling Page (Signup Form)
    public function startSelling()
    {
        return view('seller.start-selling');
    }

    // Handle Seller Registration
    public function storeSeller(Request $request)
    {
        // Validation
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp'    => 'required|digits:6',
        ]);

        // Here you would check OTP logic / create seller account
        // For now, just redirect with success message
        return redirect()->route('seller.startSelling')->with('success', 'Account created successfully!');
    }
}
