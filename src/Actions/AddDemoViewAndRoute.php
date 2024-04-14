<?php

namespace Ijpatricio\Mingle\Actions;

use Ijpatricio\Mingle\Replacement;

class AddDemoViewAndRoute
{
    private ReplaceContents $replace;

    public function __construct()
    {
        $file = base_path('routes/web.php');

        $this->replace = app(ReplaceContents::class, [
            'file' => $file
        ]);
    }

    public function __invoke(): bool
    {
        // Add the demo route.
        //
        $this->replace->addReplacement(Replacement::make([
            'search' => <<<EOT
Route::view('/', 'welcome');
EOT,
            'replace' => <<<EOT
Route::view('/', 'welcome');

Route::view('/mingle-demo', 'mingle-demo');
EOT,
        ]));

        // Create the demo page view.
        //
        file_put_contents(base_path('resources/views/mingle-demo.blade.php'),
        data: <<<EOT
        <x-guest-layout>
            @livewire('ChatApp')
        </x-guest-layout>
        EOT);

        return ($this->replace)();
    }
}
