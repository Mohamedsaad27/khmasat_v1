<?php

namespace App\Providers;

use App\Interfaces\HomeInterface;
use App\Repository\HomeRepository;
use App\Repository\PropertyRepository;
use App\Repository\DashboardRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\PropertiesPageRepository;
use App\Interfaces\PropertyRepositoryInterface;
use App\Interfaces\DashboardRepositoryInterface;
use App\Interfaces\PropertiesPageRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(DashboardRepositoryInterface::class, DashboardRepository::class);
        $this->app->bind(HomeInterface::class, HomeRepository::class);
        $this->app->bind(PropertiesPageRepositoryInterface::class, PropertiesPageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
