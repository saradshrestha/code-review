<?php

namespace Post\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Post\Repositories\PostRepository;
use Post\Repositories\PostInterface;

class PostServiceProvider extends ServiceProvider
{
    public function register (){
        $this->app->bind(
            PostInterface::class,
            PostRepository::class
        );
    }

    public function boot()
    {
        $moduleName = "Post";
        config ([
            'postRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('postRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);
    }
}
