<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Additional Compiled Classes
    |--------------------------------------------------------------------------
    |
    | Here you may specify additional classes to include in the compiled file
    | generated by the `artisan optimize` command. These should be classes
    | that are included on basically every request into the application.
    |
    */

    'files' => [
        // Reactor Service Providers and Support
        app_path('Providers/ReactorServiceProvider.php'),
        app_path('Providers/AuthServiceProvider.php'),
        app_path('Providers/EventServiceProvider.php'),
        app_path('Providers/HtmlBuildersServiceProvider.php'),
        app_path('Providers/RouteServiceProvider.php'),
        app_path('Support/Routing/RouteFilterMaker.php'),
        app_path('Support/ViewCache/ReactorViewCache.php'),

        // Hierarchy Service Providers
        base_path('vendor/nuclear/hierarchy/src/Providers/HierarchyServiceProvider.php'),
        base_path('vendor/nuclear/hierarchy/src/Providers/BuilderServiceProvider.php'),
        base_path('vendor/nuclear/hierarchy/src/Node.php'),
        base_path('vendor/nuclear/hierarchy/src/NodeRepository.php'),
        base_path('vendor/nuclear/synthesizer/src/SynthesizerServiceProvider.php'),
        base_path('vendor/kenarkose/chronicle/src/ChronicleServiceProvider.php'),
        base_path('vendor/kenarkose/sortable/src/SortableServiceProvider.php'),
        base_path('vendor/kenarkose/tracker/src/TrackerServiceProvider.php'),
        base_path('vendor/dimsav/laravel-translatable/src/Translatable/TranslatableServiceProvider.php'),

        // Documents Service Providers
        base_path('vendor/nuclear/documents/src/Providers/DocumentsServiceProvider.php'),
        base_path('vendor/kenarkose/files/src/Provider/FilesServiceProvider.php'),
        base_path('vendor/kenarkose/transit/src/Provider/TransitServiceProvider.php'),
        base_path('vendor/simexis/oembed/OembedServiceProvider.php'),
        base_path('vendor/intervention/image/src/Intervention/Image/ImageServiceProvider.php'),

        // Other Vendor Service Providers
        base_path('vendor/laracasts/flash/src/Laracasts/Flash/FlashServiceProvider.php'),
        base_path('vendor/igaster/laravel-theme/src/themeServiceProvider.php'),
        base_path('vendor/propaganistas/laravel-cache-keywords/src/CacheKeywordsServiceProvider.php'),

        // Extension Classes
        base_path('extension/Site/Providers/SiteExtensionServiceProvider.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled File Providers
    |--------------------------------------------------------------------------
    |
    | Here you may list service providers which define a "compiles" function
    | that returns additional files that should be compiled, providing an
    | easy way to get common files from any packages you are utilizing.
    |
    */

    'providers' => [
        //
    ],

];
