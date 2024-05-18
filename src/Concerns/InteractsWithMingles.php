<?php

namespace Ijpatricio\Mingle\Concerns;

use Illuminate\Support\Str;

trait InteractsWithMingles
{
    public $mingleId;

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

    public function render()
    {
        return view('mingle::mingle');
    }
}
