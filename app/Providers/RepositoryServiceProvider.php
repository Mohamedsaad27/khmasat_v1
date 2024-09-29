<?php

namespace App\Providers;

use App\Interfaces\DashboardRepositoryInterface;
use App\Repository\DashboardRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\PropertyRepository;
use App\Interfaces\PropertyRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
