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
        $this->info('This will overwrite your authentication views.');
        $confirm = $this->confirm('Do you want to continue?', true);

        if ($confirm) {
            $process = new Process(['php', 'artisan', 'vendor:publish', '--provider=XbladeAuth\XbladeAuthServiceProvider']);
            $process->run();

            if ($process->isSuccessful()) {
                $this->info('Xblade UI Auth views have been published successfully.');
            } else {
                $this->error('Failed to publish views.');
            }
        } else {
            $this->warn('Installation cancelled.');
        }
    }
}