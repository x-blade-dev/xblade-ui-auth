<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'xblade-auth');

        $this->publishes([
            __DIR__.'/Resources/views/dashboard.blade.php' => resource_path('views/dashboard.blade.php'),
            __DIR__.'/Resources/views/layouts/app.blade.php' => resource_path('views/layouts/app.blade.php'),
        
            __DIR__.'/Resources/views/auth/login.blade.php' => resource_path('views/auth/login.blade.php'),
            __DIR__.'/Resources/views/auth/register.blade.php' => resource_path('views/auth/register.blade.php'),
            __DIR__.'/Resources/views/auth/forgot-password.blade.php' => resource_path('views/auth/forgot-password.blade.php'),
            __DIR__.'/Resources/views/auth/reset-password.blade.php' => resource_path('views/auth/reset-password.blade.php'),
            __DIR__.'/Resources/views/auth/verify-email.blade.php' => resource_path('views/auth/verify-email.blade.php'),
            __DIR__.'/Resources/views/auth/confirm-password.blade.php' => resource_path('views/auth/confirm-password.blade.php'),

            __DIR__.'/Resources/views/profile/edit.blade.php' => resource_path('views/profile/edit.blade.php'),

            __DIR__.'/Resources/views/profile/partials/delete-user-form.blade.php' => resource_path('views/profile/partials/delete-user-form.blade.php'),
            __DIR__.'/Resources/views/profile/partials/update-password-form.blade.php' => resource_path('views/profile/partials/update-password-form.blade.php'),
            __DIR__.'/Resources/views/profile/partials/update-profile-information-form.blade.php' => resource_path('views/profile/partials/update-profile-information-form.blade.php'),
        
        ], 'xblade-auth-views');
    }

}
