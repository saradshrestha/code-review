<?php

namespace User\Providers;
use User\Repositories\UserInterface;
use User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class UserServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
    }

    public function boot()
    {
        $moduleName = "User";
        config ([
            'userRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('userRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);

    }
}
