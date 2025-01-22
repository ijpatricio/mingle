<?php

namespace App\Livewire;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ReactCounter extends Component implements HasMingles
{
    use InteractsWithMingles;

    public function component(): string
    {
        return 'resources/js/react-counter/index.js';
    }

    public function mount()
    {
        sleep(2);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <!-- Or a loading spinner... -->
        <div class="flex flex-col items-center justify-center gap-4 text-4xl w-[610px] h-[256px] bg-white rounded-lg">
            <p>Heavy query 2 seconds</p>
            <p>ReactJS App</p>
        </div>
        HTML;
    }

    public function mingleData(): array
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
