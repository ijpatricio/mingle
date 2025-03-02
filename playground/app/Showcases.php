<?php

namespace App;

class Showcases
{
    public static function get(): array
    {
        return [
            new Showcase(
                title: 'React Simple',
                description: 'A simple "Hello World" example.',
                routeName: 'react-hello-world',
            ),
            new Showcase(
                title: 'React Counter',
                description: 'A counter in React.',
                routeName: 'react-counter',
            ),
            new Showcase(
                title: 'Vue Counter',
                description: 'A counter in Vue.',
                routeName: 'vue-counter',
            ),
        ];
    }
}
