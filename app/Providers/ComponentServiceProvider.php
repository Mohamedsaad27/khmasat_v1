<?php

namespace App\Providers;

use App\View\Components\Admin\AdminLayout;
use App\View\Components\Admin\sidebarItems;
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
        Blade::component('admin-layout', AdminLayout::class);
        Blade::component('sidebar-items', sidebarItems::class);
    }
}
