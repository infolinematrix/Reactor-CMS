<?php

namespace Matrix\Article;

use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
        require __DIR__ . '/helpers.php';
        require __DIR__ . '/routes.php';
        require __DIR__ . '/api.php';

        $this->publishes([
            __DIR__ . '/Config/config.php' => config_path('Article.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
        //
        \View::addNamespace('Article', __DIR__ . '/Resources/views');

        //--Publish Views--//
        $this->publishes([
            __DIR__ . '/Resources/views/public' => base_path('extension/Site/Resources/Views/packages/article'),
        ]);
    }
}