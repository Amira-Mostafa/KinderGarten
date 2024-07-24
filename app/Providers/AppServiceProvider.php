<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        $this->loadAdminRoutes();
    }
    protected function loadAdminRoutes()
    {
        Route::middleware('web')->prefix('admin')
            ->namespace($this->app->getNamespace() . 'Http\Controllers')
            ->group(base_path('routes/admin.php'));
    }
}
