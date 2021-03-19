<?php

namespace Mouab215\MediaServices;

use Illuminate\Support\ServiceProvider;

class SDKServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'media-services');
        $this->mergeConfigFrom(__DIR__ . '/config/media-services.php', 'media-services');
        $this->publishes([
            __DIR__ . '/config/media-services.php' => config_path('media-services.php')
        ]);
    }

    public function register()
    {

    }
}
