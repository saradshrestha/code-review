<?php

namespace Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;


class AuthServiceProvider extends ServiceProvider
{
    public function register (){
       //
    }

    public function boot()
    {
        $moduleName = "Auth";
        config ([
            'authRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('authRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);
    }
}
