<?php

namespace App\Providers;

use App\Repository\PropertyRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\PropertyRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
