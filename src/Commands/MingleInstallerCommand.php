<?php

namespace Ijpatricio\Mingle\Commands;

use Ijpatricio\Mingle\Actions\ChangeViteConfig;
use Ijpatricio\Mingle\Actions\ChangeWelcomeBlade;
use Illuminate\Console\Command;

class MingleInstallerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mingle:install';

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
            app(ChangeWelcomeBlade::class)(),
            app(ChangeViteConfig::class)(),
        ]);

        if ($results->every(fn($result) => $result === false)) {
            $this->warn('Some files were not changed. Nothing to do.');
            return;
        }

        $this->info('File `welcome.blade.php` blade changed.');
    }
}
