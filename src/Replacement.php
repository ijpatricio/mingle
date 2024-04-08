<?php

namespace Ijpatricio\Mingle;

class Replacement
{
    public function __construct(
        public string $search,
        public string $replace,
    )
    {}

    public static function make(array $replacement): static
    {
        return app(Replacement::class, [
            'search' => $replacement['search'],
            'replace' => $replacement['replace'],
        ]);
    }
}
