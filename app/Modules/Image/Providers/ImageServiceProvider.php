<?php

namespace Image\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Image\Repositories\ImageInterface;
use Image\Repositories\ImageRepository;

class ImageServiceProvider extends ServiceProvider
{
    public function register (){
        $this->app->bind(
            ImageInterface::class,
            ImageRepository::class
        );
    }

    public function boot()
    {
        $moduleName = "Image";
        config ([
            'imageRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('admin.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);
    }
}
