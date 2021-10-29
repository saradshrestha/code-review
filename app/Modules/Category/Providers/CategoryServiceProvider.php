<?php

namespace Category\Providers;
use Category\Repositories\CategoryInterface;
use Category\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(){
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class
        );
    }
    
    public function boot()
    {
        $moduleName = "Category";
        config ([
            'categoryRoute' => File::getRequire(loadConfig('route.php', $moduleName)),
        ]);
        $this->loadRoutesFrom(loadRoutes('categoryRoute.php', $moduleName));
        $this->loadMigrationsFrom(loadMigrations ( $moduleName));
        $this->loadViewsFrom(loadViews( $moduleName), $moduleName);
        
    }
}
