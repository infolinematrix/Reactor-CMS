<?php
/**
 * Created by PhpStorm.
 * User: rahul
 * Date: 1/9/17
 * Time: 5:47 PM
 */



Route::group([
    'prefix' => 'article',
    'middleware' => ['web'],
    'namespace' => 'Matrix\Article\Http'
], function () {


    Route::get('/all', [
        'uses' => 'ArticleController@index',
        'as' => 'article']);

    Route::get('/{slug}', [
        'uses' => 'ArticleController@single',
        'as' => 'article.single']);

});