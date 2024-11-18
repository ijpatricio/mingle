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
            ->pipe($this->addReactPreamble(...))
            ->map(function ($mingle) {
                if (! is_string($mingle)) {
                    return $mingle;
                }
                return app(Vite::class)($mingle);
            })
            ->map->toHtml()
            ->implode(PHP_EOL) . PHP_EOL;
    }

    private function addReactPreamble($mingles): Collection
    {
        if (app()->environment('production')) {
            return $mingles;
        }

        if(config('mingle.react_preamble_enabled')) {
            return $mingles->prepend(app(Vite::class)->reactRefresh());
        }

        return $mingles;
    }
}
