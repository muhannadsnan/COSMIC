<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        Blade::component('partials.components.alert', 'alert');
        Blade::component('partials.components.modal', 'modal');
        Blade::component('partials.components.modalbtn', 'modalbtn');
        Blade::component('partials.components.breadcrumb', 'breadcrumb');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
