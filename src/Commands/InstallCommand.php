<?php

namespace XbladeAuth\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'xblade-auth:install';
    protected $description = 'Install Xblade UI Auth and replace Laravel Breeze views';

    public function handle()
    {
        $this->warn("⚠️  Warning: This package will replace all Laravel Breeze authentication views.");
        $this->warn("⚠️  You cannot undo this process automatically.");

        if ($this->confirm("Do you want to continue? (Y/N)", false)) {
            $this->call('vendor:publish', [
                '--tag' => 'xblade-auth-views',
                '--force' => true,
            ]);

            $this->info("✅ Xblade UI Auth installed successfully! Breeze views replaced.");
        } else {
            $this->info("❌ Installation aborted. Breeze views were not replaced.");
        }
    }
}
