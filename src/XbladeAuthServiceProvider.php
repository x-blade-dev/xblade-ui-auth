<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load views from package (resources/views dari package)
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        // Publishes untuk views yang ada dalam package
        $this->publishes([
            // Publish views auth
            __DIR__.'/Resources/views/auth' => resource_path('views/auth'),
        
            // Publish dashboard view
            __DIR__.'/Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
        
            // Publish layouts view
            __DIR__.'/Resources/views/layouts' => resource_path('views/layouts'),
        
            // Publish profile folder dan semua subfolder (termasuk partials)
            __DIR__.'/Resources/views/profile' => resource_path('views/profile'),
            
            // Profile Pages
            __DIR__.'/Resources/views/profile/edit.blade.php' => resource_path('views/profile/edit.blade.php'),
        
            // Profile Partials
            __DIR__.'/Resources/views/profile/partials/delete-user-form.blade.php' => resource_path('views/profile/partials/delete-user-form.blade.php'),
            __DIR__.'/Resources/views/profile/partials/update-password-form.blade.php' => resource_path('views/profile/partials/update-password-form.blade.php'),
            __DIR__.'/Resources/views/profile/partials/update-profile-information-form.blade.php' => resource_path('views/profile/partials/update-profile-information-form.blade.php'),

            // Auth Views (termasuk login, register, forgot password, dll)
            __DIR__.'/Resources/views/auth/login.blade.php' => resource_path('views/auth/login.blade.php'),
            __DIR__.'/Resources/views/auth/register.blade.php' => resource_path('views/auth/register.blade.php'),
            __DIR__.'/Resources/views/auth/forgot-password.blade.php' => resource_path('views/auth/forgot-password.blade.php'),
            __DIR__.'/Resources/views/auth/reset-password.blade.php' => resource_path('views/auth/reset-password.blade.php'),
            __DIR__.'/Resources/views/auth/verify-email.blade.php' => resource_path('views/auth/verify-email.blade.php'),
            __DIR__.'/Resources/views/auth/confirm-password.blade.php' => resource_path('views/auth/confirm-password.blade.php'),
            // __DIR__.'/Resources/views/auth/two-factor-challenge.blade.php' => resource_path('views/auth/two-factor-challenge.blade.php'),
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
