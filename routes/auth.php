<?php


Route::group([
    'namespace' => '\ReactorCMS\Http\Controllers\Auth',
    'middleware' => ['setTheme:' . config('themes.active'),]
], function () {

    Route::get('register', [
        'as' => 'register',
        'uses' => 'UserController@getRegister']);

    Route::post('register', [
        'as' => 'register',
        'uses' => 'UserController@postRegister']);


    Route::get('register/verify/{any}', [
        'as' => 'register.verify',
        'uses' => 'UserController@verify']);



    Route::get('login', [
        'as' => 'login',
        'uses' => 'UserController@index']);


    Route::get('forgot-password', [
        'as' => 'forgot.password',
        'uses' => 'UserController@getForgot']);

    Route::post('forgot-password', [
        'as' => 'forgot.password',
        'uses' => 'UserController@postForgot']);

    Route::get('reset-password/{any}', [
        'as' => 'auth.reset.password',
        'uses' => 'UserController@resetPassword']);


    Route::post('reset-password', [
        'as' => 'reset.password',
        'uses' => 'UserController@postRestepassword']);



    Route::get('password-reset', [
        'as' => 'password.reset',
        'uses' => 'SiteController@getHome']);

    Route::group(['middleware' => ['auth:web']], function () {

        Route::get('logout', [
            'as' => 'logout',
            'uses' => 'UserController@logout']);

        Route::get('user', [
            'as' => 'user.dashboard',
            'uses' => 'UserController@dashboard']);

        Route::get('user/profile', [
            'as' => 'user.profile',
            'uses' => 'UserController@profile']);

        Route::post('user/profile', [
            'as' => 'user.profile',
            'uses' => 'UserController@updateProfile']);

       

        Route::post('user/change/password', [
            'as' => 'user.change.password',
            'uses' => 'UserController@changePassword']);
    });
});

Route::group([
    'namespace' => '\ReactorCMS\Http\Controllers\Auth',
    'middleware' => 'web'
], function () {

    Route::post('login', [
        'as' => 'login',
        'uses' => 'UserController@login']);
});

