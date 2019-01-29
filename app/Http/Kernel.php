<?php

namespace ReactorCMS\Http;


use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
<<<<<<< HEAD
        \Illuminate\Session\Middleware\StartSession::class,
=======
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
        \Spatie\Cors\Cors::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
<<<<<<< HEAD
=======
            \Illuminate\Session\Middleware\StartSession::class,
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \ReactorCMS\Http\Middleware\EncryptCookies::class,
            \ReactorCMS\Http\Middleware\VerifyCsrfToken::class,
<<<<<<< HEAD
            \ReactorCMS\Http\Middleware\DetermineLocale::class,
            // \Reactor\Http\Middleware\RedirectIfNotInstalled::class,
            // \UxWeb\SweetAlert\ConvertMessagesIntoSweetAlert::class,
=======
            \ReactorCMS\Http\Middleware\DetermineLocale::class
            // \Reactor\Http\Middleware\RedirectIfNotInstalled::class,
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c

        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
<<<<<<< HEAD
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \ReactorCMS\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'track' => \Kenarkose\Tracker\TrackerMiddleware::class,
        'setTheme' => \Igaster\LaravelTheme\Middleware\setTheme::class,
=======
        'auth' => \ReactorCMS\Http\Middleware\Authenticate::class,
        //'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \ReactorCMS\Http\Middleware\RedirectIfAuthenticated::class,
        'secure' => \ReactorCMS\Http\Middleware\ForceSecure::class,
        'setTheme' => \Igaster\LaravelTheme\Middleware\setTheme::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'track' => \Kenarkose\Tracker\TrackerMiddleware::class,
>>>>>>> a55e7fb566919476f1352d59a4554173b8a1ae6c
    ];
}
