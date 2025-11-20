<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\Seller;
use App\Models\Otp;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    /**
     * Handle seller login (email + password)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('seller')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('seller.dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    /**
     * Show registration form
     */
    public function showStartSellingForm()
    {
        return view('seller.start-selling');
    }

    /**
     * Handle seller registration
     */
    public function startSelling(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'required|min:8|confirmed',
            'otp' => 'required|digits:6',
            'whatsapp' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $otpRecord = Otp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->where('is_used', false)
            ->latest()
            ->first();

        if (!$otpRecord) {
            return redirect()->back()->withErrors(['otp' => 'Invalid or expired OTP'])->withInput();
        }

        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp_updates' => $request->whatsapp ?? false,
            'is_verified' => true
        ]);

        $otpRecord->update(['is_used' => true]);
        Auth::guard('seller')->login($seller);

        return redirect()->route('seller.dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('seller.auth.forgot-password');
    }

    /**
     * Send reset password link to email
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('sellers')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show password reset form (from email link)
     */
    public function showResetForm($token)
    {
        return view('seller.auth.reset-password', ['token' => $token]);
    }

    /**
     * Reset seller password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('sellers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($seller, $password) {
                $seller->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('seller.login')->with('success', 'Password reset successfully!')
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Logout seller
     */
    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('seller.login')->with('success', 'Logged out successfully!');
    }
}
