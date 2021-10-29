<?php

namespace Cart\Providers;
use Cart\Repositories\CartInterface;
use Cart\Repositories\CartRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class CartServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(
            CartInterface::class,
            CartRepository::class
        );
    }

    public function boot()
    {
        $moduleName = "Cart";
        config ([
            'cartRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('cartRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);

    }
}
