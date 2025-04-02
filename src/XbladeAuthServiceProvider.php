<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;

class XbladeAuthServiceProvider extends ServiceProvider
{
    
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

}
