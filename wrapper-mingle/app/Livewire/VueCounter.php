<?php

namespace App\Livewire;

use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Ijpatricio\Mingle\Contracts\HasMingles;
use Illuminate\Support\Str;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class VueCounter extends Component implements HasMingles
{
    use InteractsWithMingles;

    public function component(): string
    {
        return 'resources/js/vue-counter/index.js';
    }

    public function mount()
    {
        sleep(1);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <!-- Or a loading spinner... -->
        <div class="flex items-center justify-center text-4xl w-[718px] h-[256px] bg-white rounded-lg">
            Hang tight, I'm loading...
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
        $this->dispatch('doubleIt', randomString: Str::random(10));

        return $amount * 2;
    }
}
