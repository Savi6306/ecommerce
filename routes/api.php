<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\OtpController;
use App\Http\Controllers\Seller\AuthController;
use App\Http\Controllers\DataController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| ये routes हमेशा JSON response return करेंगे (Postman/Mobile app के लिए).
*/

// OTP Routes
Route::prefix('otp')->group(function () {
    Route::post('/send', [OtpController::class, 'sendOtp']);        // OTP Send
    Route::post('/verify', [OtpController::class, 'verifyOtp']);    // OTP Verify
});

// Forgot Password Flow
Route::prefix('auth')->group(function () {
    Route::post('/send-forgot-password-otp', [AuthController::class, 'sendForgotPasswordOtp']); 
    Route::post('/reset-password', [AuthController::class, 'resetPassword']); 
});
// Example
