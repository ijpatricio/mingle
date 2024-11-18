<?php

namespace Ijpatricio\Mingle\Concerns;

use Illuminate\Support\Str;

trait InteractsWithMingles
{
    public $mingleId;

    public function __construct()
    {
        app('mingle')->register($this->component());
    }

    public function mingleData(): array
    {
        return [
            //
        ];
    }

    public function mountInteractsWithMingles()
    {
        $this->mingleId = 'mingle-' . Str::random();
    }

    public function render(): mixed
    {
        return view('mingle::mingle');
    }
}
