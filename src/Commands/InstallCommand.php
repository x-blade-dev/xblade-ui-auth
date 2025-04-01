<?php

namespace XbladeAuth\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'xblade-ui-auth:install';
    protected $description = 'Install Xblade UI Auth and publish views';

    public function handle()
    {
        $this->info("This package will replace all Breeze authentication views.");
    
        if ($this->confirm('Do you want to continue?', true)) {
            $this->call('vendor:publish', [
                '--tag' => 'xblade-auth-views',
                '--force' => true
            ]);

            $this->info('✅ All authentication views have been replaced successfully.');
        } else {
            $this->warn('❌ Installation canceled. No files were replaced.');
        }
    }
}
