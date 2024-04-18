<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;
use Illuminate\Support\Facades\File;

class ChangeLayoutFile
{
    private ReplaceContents $replace;

    public function __construct(
        protected string $filePath
    ) {
        $file = base_path($filePath);

        $this->replace = app(ReplaceContents::class, [
            'file' => $file
        ]);
    }

    public function __invoke(): bool
    {
        if (! File::exists($this->filePath)) {
            return false;
        }

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
