<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/9/17
 * Time: 5:47 PM
 */
Route::group([
    'prefix' => 'location',
    'middleware' => ['web'],
    'namespace' => 'Matrix\Locations\Http'
], function () {


    Route::get('/api/{id?}', [
        'uses' => 'LocationsController@getLocationapi',
        'as' => 'location.api']);

    Route::get('/search/{any}', [
        'uses' => 'LocationsController@searchLocation',
        'as' => 'location.search']);

});