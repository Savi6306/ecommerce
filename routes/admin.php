<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Protected routes (only admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


