<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The controller namespace for the application.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * The path to the "home" route for your application.
     */
    public const HOME = '/home';

    /**
     * Define the routes for the application.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Default web routes
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            // Seller routes
            Route::middleware('web')
                ->prefix('seller')
                ->namespace($this->namespace)
                ->group(base_path('routes/seller.php'));

            // Admin routes
            Route::middleware('web')
                ->prefix('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            // API routes
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });
    }
}
