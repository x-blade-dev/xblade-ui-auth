<?php

namespace XbladeAuth;

use Illuminate\Support\ServiceProvider;
use XbladeAuth\Commands\InstallCommand;

class XbladeAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Pastikan path benar
        $viewsPath = __DIR__.'/../Resources/views';

        if (!is_dir($viewsPath)) {
            \Log::error("❌ XbladeAuth: Folder views tidak ditemukan di {$viewsPath}");
            return;
        }

        $this->loadViewsFrom($viewsPath, 'xblade-auth');

        $this->publishes([
            "{$viewsPath}/auth" => resource_path('views/auth'),
            "{$viewsPath}/dashboard.blade.php" => resource_path('views/dashboard.blade.php'),
            "{$viewsPath}/layouts" => resource_path('views/layouts'),
            "{$viewsPath}/profile" => resource_path('views/profile'),
        ], 'xblade-auth-views');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
