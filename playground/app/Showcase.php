<?php

namespace App;

/**
 * Represents a Mingle showcase containing details like title, description, and associated view name.
 */
readonly class Showcase
{
    public function __construct(
        public string $title,
        public string $description,
        public string $routeName,
    )
    {}
}
