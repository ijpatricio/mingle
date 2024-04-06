<?php

namespace App\Livewire;

use Ijpatricio\Mingle\HasMingles;
use Ijpatricio\Mingle\InteractsWithMingles;
use Livewire\Component;

class ReactCounter extends Component implements HasMingles
{
    use InteractsWithMingles;

    public int $count = 0;

    public function component(): string
    {
        return 'resources/js/react-counter/index.jsx';
    }

    public function mingleData()
    {
        return [
            'message' => 'Message in a bottle 🍾',
        ];
    }

    public function doubleIt($amount)
    {
        return $amount * 2;
    }
}
