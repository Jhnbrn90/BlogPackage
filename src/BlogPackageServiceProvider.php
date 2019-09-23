<?php

namespace JohnDoe\BlogPackage;

use Illuminate\Support\ServiceProvider;
use JohnDoe\BlogPackage\Console\InstallBlogPackage;
use JohnDoe\BlogPackage\Providers\EventServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blogpackage');

        $this->app->register(EventServiceProvider::class);
    }

    public function boot()
    {
        // Register a Facade
        $this->app->bind('calculator', function($app) {
            return new Calculator();
        });

        // Register the model factories
        $this->app->make('Illuminate\Database\Eloquent\Factory')
            ->load(__DIR__.'/../database/factories');

        $this->loadRoutesFrom(__DIR__.'../../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogpackage');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blogpackage.php'),
            ], 'config');

            $this->commands([
                InstallBlogPackage::class,
            ]);

            if (! class_exists('CreatePostsTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_posts_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blogpackage'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('blogpackage'),
            ], 'assets');
        }
    }
}