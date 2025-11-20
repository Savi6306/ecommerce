<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    // Forgot Password Form
    public function showForgotForm()
    {
        return view('user.forgot');
    }

  // Send Reset Link
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers,email',
        ]);

        // Use the 'customers' broker
        $status = Password::broker('customers')->sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password reset link sent to your email!');
        }

        return back()->withErrors(['email' => 'Unable to send reset link.']);
    }

    // Show reset password form
public function showResetForm($token)
{
    return view('user.reset', ['token' => $token]);
}

// Handle reset password submission
public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:customers,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::broker('customers')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($customer, $password) {
            $customer->password = bcrypt($password);
            $customer->save();
        }
    );

    if ($status == Password::PASSWORD_RESET) {
        return redirect()->route('user.login')->with('success', 'Password reset successfully!');
    }

    return back()->withErrors(['email' => [__($status)]]);
}

}