<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register custom Blade components (for Laravel exception rendering)
        Blade::component('laravel-exceptions-renderer::components.navigation', 'exceptions-navigation');
        Blade::component('laravel-exceptions-renderer::components.card', 'exceptions-card');
        Blade::component('laravel-exceptions-renderer::components.trace-and-editor', 'exceptions-trace');
        Blade::component('laravel-exceptions-renderer::components.context', 'exceptions-context');

        // ✅ Use Bootstrap 5 pagination styling
        Paginator::useBootstrapFive();
    }
}
