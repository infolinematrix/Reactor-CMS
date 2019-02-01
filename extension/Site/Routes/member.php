<?php
/**
 * User: dev
 * Date: 31/1/19
 * Time: 1:44 PM
 */
Route::group(['prefix' => 'member', 'middleware' => ['setTheme:' . config('themes.active'),'auth:web']], function () {


        // Testing Routes
    Route::get('/', ['as' => 'member', 'uses' => 'MemberController@index']);
    Route::get('/profile', ['as' => 'member.profile', 'uses' => 'MemberController@getProfile']);
    Route::post('/profile', ['as' => 'member.profile', 'uses' => 'MemberController@postProfile']);
    Route::get('profile/{id}/edit/{source?}', ['as' => 'member.profile.edit', 'uses' => 'MemberController@editProfile']);
    Route::put('profile/{id}/edit/{source?}', ['as' => 'member.profile.update', 'uses' => 'MemberController@updateProfile']);


});