<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views from package (path relatif untuk views di Resources)
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'xblade-auth');

        // Publishes untuk views yang ada dalam package
        $this->publishes([
            // Publish views auth
            __DIR__.'/../Resources/views/auth' => resource_path('views/auth'),
        
            // Publish dashboard view
            __DIR__.'/../Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
        
            // Publish layouts view
            __DIR__.'/../Resources/views/layouts' => resource_path('views/layouts'),
        
            // Publish profile folder dan semua subfolder (termasuk partials)
            __DIR__.'/../Resources/views/profile' => resource_path('views/profile'),
        ], 'xblade-auth-views');
        
        // Register console commands jika ada
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        // Register dependencies jika ada
    }
}
