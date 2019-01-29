<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 7/7/17
 * Time: 5:50 PM
 */

Route::group([
    'prefix' => config('app.reactor_prefix') . '/article',
    'middleware' => ['set-theme:' . config('themes.active_reactor'), 'web'],
    'namespace' => 'Matrix\Article\Http'
], function () {

    Route::get('/', [
        'uses' => 'ArticleController@show',
        'as' => 'reactor.article.index',
    ]);

    Route::get('/create/{id?}', [
        'uses' => 'ArticleController@Create',
        'as' => 'reactor.article.create',
    ]);
    Route::post('/create/{id?}', [
        'uses' => 'ArticleController@Store',
        'as' => 'reactor.article.create',
    ]);


    Route::get('{id}/edit/{source?}', [
        'uses' => 'ArticleController@edit',
        'as' => 'reactor.article.edit']);

    Route::put('{id}/edit/{source}', [
        'uses' => 'ArticleController@update',
        'as' => 'reactor.article.update']);

    Route::delete('{id}', [
        'uses' => 'ArticleController@update',
        'as' => 'reactor.article.destroy']);

    //--Translation
    Route::get('{id}/translate', [
        'uses' => 'ArticleController@createTranslation',
        'as' => 'reactor.article.translation.create']);

    Route::post('{id}/translate', [
        'uses' => 'ArticleController@storeTranslation',
        'as' => 'reactor.article.translation.store']);

    Route::delete('translation/{id}', [
        'uses' => 'ArticleController@destroyTranslation',
        'as' => 'reactor.article.translation.destroy']);


});




