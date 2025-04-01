<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views from package
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        // Publish all views in one go
        $this->publishes([
            // Publish all auth views
            __DIR__.'/Resources/views/auth' => resource_path('views/auth'),
            
            // Publish dashboard
            __DIR__.'/Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
            
            // Publish layouts
            __DIR__.'/Resources/views/layouts' => resource_path('views/layouts'),
            
            // Publish profile and all its contents recursively
            __DIR__.'/Resources/views/profile' => resource_path('views/profile'),
        ], 'xblade-auth-views');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        // Register dependencies if any
    }
}