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

