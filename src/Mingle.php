<?php

namespace Ijpatricio\Mingle;

use Illuminate\Foundation\Vite;

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
            ->implode(" " . PHP_EOL);
    }
}
