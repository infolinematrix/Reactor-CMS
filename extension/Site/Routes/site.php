<?php

Route::group(['middleware' => ['track', 'setTheme:' . config('themes.active')]], function () {

    // Home
    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'SiteController@getHome']);

    // Contact Us
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@getContact']);
    Route::post('/contact', ['as' => 'site.contact', 'uses' => 'SiteController@postContact']);

    // Testing Routes
    Route::get('/browse', ['as' => 'site.browse', 'uses' => 'SiteController@browse']);
    Route::get('/single', ['as' => 'site.single', 'uses' => 'SiteController@single']);
    Route::get('/single', ['as' => 'site.single', 'uses' => 'SiteController@single']);


    /**
     * Include All routes
     * from Routes Folder
     */
    require 'member.php';

});