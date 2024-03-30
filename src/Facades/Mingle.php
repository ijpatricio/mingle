<?php

namespace Ijpatricio\Mingle\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ijpatricio\Mingle\Mingle
 */
class Mingle extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ijpatricio\Mingle\Mingle::class;
    }
}
