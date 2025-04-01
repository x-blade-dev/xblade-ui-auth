<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views from the package directory
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        // Publish the entire views directory instead of individual files
        $this->publishes([
            __DIR__.'/Resources/views' => resource_path('views/vendor/xblade-auth'), // Use vendor folder for views
        ], 'xblade-auth-views');
        
        // Register commands when running in console
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        // Any additional bindings or services can be registered here
    }
}
