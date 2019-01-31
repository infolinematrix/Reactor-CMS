<?php

Route::group(['middleware' => ['track']], function () {

    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'SiteController@getHome']);



});