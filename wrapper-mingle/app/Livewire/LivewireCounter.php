<?php

namespace App\Livewire;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class LivewireCounter extends Component
{
    /**
     * Someone reached the integer limit, so, let's use a float.
     */
    public float $count = 1;

    public string $message;

    public function mount()
    {
        sleep(1);

        $this->message = 'Message in a bottle 🍾';
    }

    public function placeholder()
    {
        return <<<'HTML'
        <!-- Or a loading spinner... -->
        <div class="flex flex-col items-center justify-center gap-4 text-4xl w-[660px] h-[364px] bg-white rounded-lg">
            <p>I sleep 1 second</p>
            <p>ReactJS App</p>
        </div>
        HTML;
    }

    public function keepIt()
    {
        $this->reset('count');
    }

    public function doubleIt()
    {
        $this->count *= 2;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
