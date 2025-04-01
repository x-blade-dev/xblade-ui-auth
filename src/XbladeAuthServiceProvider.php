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
        
            __DIR__.'/Resources/views/auth/login.blade.php' => resource_path('views/auth/login.blade.php'),
            __DIR__.'/Resources/views/auth/register.blade.php' => resource_path('views/auth/register.blade.php'),
            __DIR__.'/Resources/views/auth/forgot-password.blade.php' => resource_path('views/auth/forgot-password.blade.php'),
            __DIR__.'/Resources/views/auth/reset-password.blade.php' => resource_path('views/auth/reset-password.blade.php'),
            __DIR__.'/Resources/views/auth/verify-email.blade.php' => resource_path('views/auth/verify-email.blade.php'),
            __DIR__.'/Resources/views/auth/confirm-password.blade.php' => resource_path('views/auth/confirm-password.blade.php'),
            // __DIR__.'/Resources/views/auth/two-factor-challenge.blade.php' => resource_path('views/auth/two-factor-challenge.blade.php'),
        
        ], 'xblade-auth-views');
        

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        // 
    }
}