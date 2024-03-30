<?php

namespace Ijpatricio\Mingle\Commands;

use Illuminate\Console\Command;

class MingleCommand extends Command
{
    public $signature = 'minglejs';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
