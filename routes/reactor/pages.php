<?php


Route::get('/pages', [
    'uses' => 'PagesController@index',
    'as' => 'reactor.pages']);

Route::get('/pages/{id}/edit/{source?}', [
    'uses' => 'PagesController@edit',
    'as' => 'reactor.pages.edit']);

Route::put('/pages/{id}/edit/{source}', [
    'uses' => 'PagesController@update',
    'as' => 'reactor.pages.update']);

//--Translation
Route::get('/pages/{id}/translate', [
    'uses' => 'PagesController@createTranslation',
    'as' => 'reactor.pages.translation.create']);

Route::post('/pages/{id}/translate', [
    'uses' => 'PagesController@storeTranslation',
    'as' => 'reactor.pages.translation.store']);

Route::delete('/pages/translation/{id}', [
    'uses' => 'PagesController@destroyTranslation',
    'as' => 'reactor.pages.translation.destroy']);
