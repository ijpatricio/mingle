<?php

namespace Ijpatricio\Mingle\Concerns;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait InteractsWithMingles
{
    public $mingleId;

    public function mingleBoot(Collection $data): Collection
    {
        //

        return $data;
    }

    public function mingleData(Collection $data): Collection
    {
        //

        return $data;
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
