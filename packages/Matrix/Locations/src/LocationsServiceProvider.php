<?php

namespace Matrix\Locations;

use Illuminate\Support\ServiceProvider;

class LocationsServiceProvider extends ServiceProvider
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
        \View::addNamespace('Locations', __DIR__ . '/Resources/views');
    }
}