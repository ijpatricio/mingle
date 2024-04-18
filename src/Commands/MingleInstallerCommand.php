<?php

namespace Ijpatricio\Mingle\Commands;

use Ijpatricio\Mingle\Actions\AddDemoViewAndRoute;
use Ijpatricio\Mingle\Actions\ChangeViteConfig;
use Ijpatricio\Mingle\Actions\ChangeLayoutFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MingleInstallerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mingle:install {--with-demo}';

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
        $results = collect([
            app(ChangeLayoutFile::class, ['filePath' => 'resources/views/layouts/guest.blade.php',])(),
            app(ChangeLayoutFile::class, ['filePath' => 'resources/views/layouts/app.blade.php',])(),
            app(ChangeViteConfig::class)(),
        ]);

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

        if ($results->every(fn($result) => $result === false)) {
            $this->warn('Some files were not changed. Nothing to do.');
            return;
        }

        $this->info('Installed finished. Happy Mingling!');
    }
}
