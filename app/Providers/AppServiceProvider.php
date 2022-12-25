<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//tambahan 1
use Illuminate\Support\Facades\Schema;

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
        //tambahan 2
        Schema::defaultStringLength(191);Schema::defaultStringLength(191);
    }
}
