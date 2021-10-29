<?php

namespace Dashboard\Providers;
use Dashboard\Repositories\DashboardInterface;
use Dashboard\Repositories\DashboardRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class DashboardServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(
            DashboardInterface::class,
            DashboardRepository::class
        );
    }

    public function boot()
    {
        $moduleName = "Dashboard";
        config ([
            'dashboardRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('dashboardRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);

    }
}
