<?php

namespace Matrix\Categories;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
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
     
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
        \View::addNamespace('Categories', __DIR__ . '/Resources/views');
    }

    

}