<?php

<<<<<<< HEAD

=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
Route::get('/', [
    'uses' => 'DashboardController@index',
    'as' => 'reactor.dashboard']);

Route::get('activity', [
    'uses' => 'DashboardController@activity',
    'as' => 'reactor.dashboard.activity']);