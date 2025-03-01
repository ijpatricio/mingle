<?php

namespace App\Livewire;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use Livewire\Component;

class ReactCounter extends Component implements HasMingles
{
    use InteractsWithMingles;

    public $count = 1;

    public function component(): string
    {
        return 'resources/js/react-counter/index.js';
    }

    public function mingleData(): array
    {
        return [
            'message' => 'Message in a bottle 🍾',
            'count' => $this->count
        ];
    }

    public function resetCount()
    {
        $this->count = 1;
    }

    public function doubleIt()
    {
        $this->count *= 2;
    }
}
