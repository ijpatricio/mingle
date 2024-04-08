<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;

class ChangeWelcomeBlade
{
    private ReplaceContents $replace;

    public function __construct()
    {
        $file = base_path('resources/views/welcome.blade.php');

        $this->replace = app(ReplaceContents::class, [
            'file' => $file
        ]);
    }

    public function __invoke(): bool
    {
        // Add the @stack('scripts') directive before the @vite directive
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
        @vite(['resources/css/app.css', 'resources/js/app.js'])
EOT,
            'replace' => <<<EOT
        @stack('scripts')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
EOT,
        ]));


        // Add the Demo Mingle
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
    </body>
EOT,
            'replace' => <<<EOT
        @livewire('Foo')
    </body>
EOT,
        ]));


        return ($this->replace)();
    }
}
