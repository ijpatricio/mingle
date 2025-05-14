<?php

namespace Ijpatricio\Mingle\Commands;

use Ijpatricio\Mingle\Actions\AddDemoViewAndRoute;
use Ijpatricio\Mingle\Actions\ChangeViteConfig;
use Ijpatricio\Mingle\Actions\ChangeLayoutFile;
use Ijpatricio\Mingle\Actions\CreateMingleLayout;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MingleInstallerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mingle:install {--with-demo} {--for-laravel-12-livewire-starter} {--l12ls}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Mingle boilerplate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if the user is using Laravel 12 Livewire Starter using either of the optional options
        //
        $useL12ls = $this->option('for-laravel-12-livewire-starter') || $this->option('l12ls');
        
        // If it is a laravel 12 livewire starter, we will use the new layout file
        // else we will retain the existing code logic for now (was working with laravel 11)
        // Potential option would be to consider enabling option selection without for no param command
        //
        if ($useL12ls) {
            $results = collect([
                app(CreateMingleLayout::class, ['filePath' => 'resources/views/components/layouts'])(),
                app(ChangeViteConfig::class)(),
            ]);
        } else {
            $results = collect([
                app(ChangeLayoutFile::class, ['filePath' => 'resources/views/layouts/guest.blade.php',])(),
                app(ChangeLayoutFile::class, ['filePath' => 'resources/views/layouts/app.blade.php',])(),
                app(ChangeViteConfig::class)(),
            ]);
        }

        if ($this->option('with-demo')) {
            $results->push(
                app(AddDemoViewAndRoute::class)(),
            );
            Artisan::call('make:mingle', [
                'framework' => 'react',
                'name' => 'Demo',
                '--jsfile' => 'resources/js/ChatApp.js',
                '--force' => true,
            ]);
        }

        // If decided to make the layout creation more interactive this logic will need updating
        //
        if ($results->every(fn($result) => $result === false)) {
            $this->warn('Some files were not changed. Nothing to do.');
            return;
        }

        $this->info('Installed finished. Happy Mingling!');
    }
}
