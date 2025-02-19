<?php

namespace Ijpatricio\Mingle;

use Illuminate\Foundation\Vite;
use Illuminate\Support\Collection;

class Mingle
{
    protected array $mingles = [];

    public function asset(string $mingle): string
    {
        $mingle = app(Vite::class)($mingle)->toHtml();

        return $this->addReactPreambleToTheTop($mingle);
    }

    private function addReactPreambleToTheTop($mingle): string
    {
        $vite = app(Vite::class);

        $isReactPreambleEnabled = config('mingle.react_preamble_enabled');

        if($vite->isRunningHot() && $isReactPreambleEnabled) {
            return $vite->reactRefresh()->toHtml() . PHP_EOL . $mingle;
        }

        return $mingle;
    }
}
