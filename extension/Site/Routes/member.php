<?php
/**
 * User: dev
 * Date: 31/1/19
 * Time: 1:44 PM
 */
Route::group(['prefix' => 'member', 'middleware' => ['setTheme:' . config('themes.active')]], function () {

    // Testing Routes
    Route::get('/', ['as' => 'member', 'uses' => 'MemberController@index']);
    Route::get('/profile', ['as' => 'member.profile', 'uses' => 'MemberController@getProfile']);


});