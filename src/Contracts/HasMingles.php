<?php

namespace Ijpatricio\Mingle\Contracts;

interface HasMingles
{
    public function component(): string;

    public function mingleData(): array;
}
