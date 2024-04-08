<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;

class ChangeGuestLayout
{
    private ReplaceContents $replace;

    public function __construct()
    {
        $file = base_path('resources/views/layouts/guest.blade.php');

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

        return ($this->replace)();
    }
}
