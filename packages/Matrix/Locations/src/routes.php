<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 7/7/17
 * Time: 5:50 PM
 */

Route::group([
    'prefix' => config('app.reactor_prefix') . '/location',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],
    'namespace' => 'Matrix\Locations\Http'
], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {

        Route::get('/{id?}', [
            'uses' => 'LocationsController@index',
            'as' => 'reactor.location.index',
        ]);

        Route::get('/create/{id?}', [
            'uses' => 'LocationsController@Create',
            'as' => 'reactor.location.create',
        ]);
        Route::post('/create/{id?}', [
            'uses' => 'LocationsController@Store',
            'as' => 'reactor.location.create',
        ]);


        Route::get('{id}/edit/{source?}', [
            'uses' => 'LocationsController@edit',
            'as' => 'reactor.location.edit']);

        Route::put('{id}/edit/{source}', [
            'uses' => 'LocationsController@update',
            'as' => 'reactor.location.update']);

        Route::delete('{id}', [
            'uses' => 'LocationsController@update',
            'as' => 'reactor.location.destroy']);

        //--Translation
        Route::get('{id}/translate', [
            'uses' => 'LocationsController@createTranslation',
            'as' => 'reactor.location.translation.create']);

        Route::post('{id}/translate', [
            'uses' => 'LocationsController@storeTranslation',
            'as' => 'reactor.location.translation.store']);

        Route::delete('translation/{id}', [
            'uses' => 'LocationsController@destroyTranslation',
            'as' => 'reactor.location.translation.destroy']);



    });


});




