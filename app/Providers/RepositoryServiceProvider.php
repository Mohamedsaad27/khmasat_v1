<?php

namespace App\Providers;

use App\Interfaces\HomeInterface;
use App\Repository\Api\CategoryRepository as ApiCategoryRepository;
use App\Repository\Web\CategoryRepository as WebCategoryRepository;
use App\Repository\Api\TypePropertiesRepository as ApiTypePropertiesRepository;
use App\Repository\Web\HomeRepository;
use App\Repository\Web\PropertyRepository;
use App\Repository\Web\DashboardRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Web\PropertiesPageRepository;
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
        $this->app->bind('WebCategoryRepository', WebCategoryRepository::class);
        $this->app->bind('ApiCategoryRepository', ApiCategoryRepository::class);
        $this->app->bind('ApiTypePropertiesRepository', ApiTypePropertiesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
