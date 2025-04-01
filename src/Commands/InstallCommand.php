<?php

namespace XbladeAuth\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'xblade-ui-auth:install';
    protected $description = 'Install Xblade UI Auth and publish views';

    public function handle()
    {
        $this->info("🚀 Installing Xblade UI Auth...");

        // Cek apakah service provider sudah terdaftar
        if (!array_key_exists('XbladeAuth\XbladeAuthServiceProvider', app()->getLoadedProviders())) {
            $this->error('❌ XbladeAuthServiceProvider belum terdaftar. Pastikan package ini di-load di config/app.php.');
            return;
        }

        // Konfirmasi sebelum mengganti file
        if ($this->confirm('⚠️ This will replace all Breeze authentication views. Do you want to continue?', true)) {
            // Jalankan perintah vendor:publish
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
