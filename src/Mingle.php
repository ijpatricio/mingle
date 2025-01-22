<?php

namespace Ijpatricio\Mingle;

use Illuminate\Foundation\Vite;
use Illuminate\Support\Collection;

class Mingle
{
    protected array $mingles = [];

    public function register($mingle): self
    {
        $this->mingles[] = $mingle;

        return $this;
    }

    public function mingleScripts(): string
    {
        return collect($this->mingles)
            ->unique()
            ->map(fn($mingle) => app(Vite::class)($mingle)->toHtml())
            ->pipe($this->addReactPreambleToTheTop(...))
            ->implode(PHP_EOL) . PHP_EOL;
    }

    private function addReactPreambleToTheTop($mingles): Collection
    {
        $vite = app(Vite::class);

        $isReactPreambleEnabled = config('mingle.react_preamble_enabled');

        if($vite->isRunningHot() && $isReactPreambleEnabled) {
            return $mingles->prepend(
                $vite->reactRefresh()->toHtml()
            );
        }

        return $mingles;
    }
}
