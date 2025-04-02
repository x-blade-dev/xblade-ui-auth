<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeUIAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrapping services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        $this->publishes([
            __DIR__.'/Resources/views/auth' => resource_path('views/auth'),
            __DIR__.'/Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
            __DIR__.'/Resources/views/layouts' => resource_path('views/layouts'),
            __DIR__.'/Resources/views/profile' => resource_path('views/profile'),

        ], 'xblade-auth-views');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Additional services or bindings can be added here if needed
    }
}
