<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use PHPUnit\Event\Runtime\PHP;

class TestBladeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-blade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $directives = Blade::getCustomDirectives();
        print_r(array_keys($directives));
        echo PHP_EOL;

        $rendered = Blade::render('@mingles');

        if (Str::length(trim($rendered)) < 1) {
            $this->error('Directive not working');
            exit(1);
        }

        $this->info($rendered);
    }
}
