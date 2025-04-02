<?php

namespace XbladeUIAuth;

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
        // Load views from the package directory using the correct namespace
        $this->loadViewsFrom(__DIR__.'/views', 'xblade-ui-auth'); // Memuat views dari direktori package

        // Publish the entire views directory instead of individual files
        $this->publishes([
            __DIR__.'/views' => resource_path('views'), // Menyalin views ke folder resources/views
        ], 'xblade-ui-auth-views');        

        // Register commands when running in console
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
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
