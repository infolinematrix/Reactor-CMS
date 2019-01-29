<?php

Route::group([
    'prefix' => config('app.reactor_prefix'),
    'middleware' => ['setTheme:' . config('themes.active_reactor')]
], function () {

<<<<<<< HEAD
    // Authenticated reactor
    require 'reactor/auth.php';

    Route::group(['middleware' => ['auth:admin', 'can:ACCESS_REACTOR']], function () {

=======
    require 'reactor/auth.php';


    // Authenticated reactor
    Route::group(['middleware' => ['auth:admin', 'can:ACCESS_REACTOR']], function () {
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        require 'reactor/dashboard.php';
        require 'reactor/documents.php';
        require 'reactor/mailings.php';
        require 'reactor/maintenance.php';
        require 'reactor/nodes.php';
        require 'reactor/nodetypes.php';
        require 'reactor/permissions.php';
        require 'reactor/profile.php';
        require 'reactor/roles.php';
        require 'reactor/tags.php';
        require 'reactor/update.php';
        require 'reactor/users.php';
        require 'reactor/settings.php';
    });

<<<<<<< HEAD

    
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
});