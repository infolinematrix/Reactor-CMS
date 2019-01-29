<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


<<<<<<< HEAD

require 'common.php';
require 'auth.php';

Route::group([
    'namespace' => '\ReactorCMS\Http\Controllers',
], function () {

    require routes_path('reactor.php');

});




Route::group(['namespace' => '\ReactorCMS\Http\Controllers'], function () {

    // Web Route
    Route::get('/', [
        'as' => 'site.home',
        'uses' => 'Controller@getHome']);


});
=======
Route::group([
    'middleware' => []
], function () {

});


Route::get('/', function () {
    return view('welcome');
});


require 'common.php';

// Reactor routes
require routes_path(config('themes.active_reactor') . '.php');

// Install routes
if (!is_installed()) require routes_path('install.php');


Route::get('{path}', function () {
    return file_get_contents(public_path('_nuxt/index.html'));
})->where('path', '(.*)');
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

