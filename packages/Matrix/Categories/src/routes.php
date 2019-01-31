<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 7/7/17
 * Time: 5:50 PM
 */
Route::group([
    'prefix' => config('app.reactor_prefix') . '/category',
    'middleware' => ['setTheme:' . config('themes.active_reactor'), 'web'],
    'namespace' => 'Matrix\Categories\Http'
], function () {

    Route::group([
        'middleware' => ['auth:admin'],

    ], function () {

        Route::get('/{id?}', [
            'uses' => 'CategoriesController@index',
            'as' => 'reactor.category.index',
        ]);

        Route::get('/create/{id?}', [
            'uses' => 'CategoriesController@Create',
            'as' => 'reactor.category.create',
        ]);
        Route::post('/create/{id?}', [
            'uses' => 'CategoriesController@Store',
            'as' => 'reactor.category.create',
        ]);


        Route::get('{id}/edit/{source?}', [
            'uses' => 'CategoriesController@edit',
            'as' => 'reactor.category.edit']);

        Route::put('{id}/edit/{source}', [
            'uses' => 'CategoriesController@update',
            'as' => 'reactor.category.update']);

        Route::delete('{id}', [
            'uses' => 'CategoriesController@update',
            'as' => 'reactor.category.destroy']);

        //--Translation
        Route::get('{id}/translate', [
            'uses' => 'CategoriesController@createTranslation',
            'as' => 'reactor.category.translation.create']);

        Route::post('{id}/translate', [
            'uses' => 'CategoriesController@storeTranslation',
            'as' => 'reactor.category.translation.store']);

        Route::delete('translation/{id}', [
            'uses' => 'CategoriesController@destroyTranslation',
            'as' => 'reactor.category.translation.destroy']);

    });
});

