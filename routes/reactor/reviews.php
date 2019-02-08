<?php


Route::get('/reviews', [
    'uses' => 'ReviewsController@index',
    'as' => 'reactor.reviews']);

Route::get('/review/view/{id}', [
    'uses' => 'ReviewsController@view',
    'as' => 'reactor.reviews.view']);

Route::get('/review/publish/{id}', [
    'uses' => 'ReviewsController@publish',
    'as' => 'reactor.reviews.publish']);

Route::get('/review/destroy/{id}', [
    'uses' => 'ReviewsController@destroy',
    'as' => 'reactor.reviews.destroy']);