<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => 'web',            // DEFAULT MUST ALWAYS BE 'web'
        'passwords' => 'users',
    ],


    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [

        // Normal website users (public)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Customer user section
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],

        // Seller section
        'seller' => [
            'driver' => 'session',
            'provider' => 'sellers',
        ],

        // Admin section
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [

        // Default Laravel users table
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // Customer users
        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\User\Customer::class,
        ],

        // Sellers
        'sellers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Seller::class,
        ],

        // Admins
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [

        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [
            'provider' => 'customers',
            'table' => 'customer_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'sellers' => [
            'provider' => 'sellers',
            'table' => 'seller_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];
