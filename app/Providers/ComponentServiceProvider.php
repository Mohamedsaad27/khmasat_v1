<?php

namespace App\Providers;

use App\View\Components\Front\FrontLayout;
use Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('front-layout', FrontLayout::class);
    }
}
