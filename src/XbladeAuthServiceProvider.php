<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;


class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        $this->publishes([
            __DIR__.'/Resources/views/auth' => resource_path('views/auth'),
            __DIR__.'/Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
            __DIR__.'/Resources/views/layouts' => resource_path('views/layouts'),
        ], 'xblade-auth-views');
    }

    public function register()
    {
        $this->commands([
            InstallCommand::class,
        ]);
    }
}
