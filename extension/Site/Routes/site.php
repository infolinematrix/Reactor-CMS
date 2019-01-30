<?php

Route::group(['middleware' => ['track', 'setTheme:' . config('themes.active')]], function () {

    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'SiteController@getHome']);
    Route::get('/contact', [
        'as' => 'site.contact',
        'uses' => 'SiteController@getHome']);



});