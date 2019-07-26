<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \Spatie\Flash\Flash::levels([
            'primary' => 'alert-primary',
            'secondary' => 'alert-secondary',
            'success' => 'alert-success',
            'info' => 'alert-info',
            'warning' => 'alert-warning',
            'error' => 'alert-error',
        ]);

    }
}
