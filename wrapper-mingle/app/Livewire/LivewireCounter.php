<?php

namespace App\Livewire;

use Livewire\Component;

class LivewireCounter extends Component
{
    public int $count = 1;

    public string $message;

    public function mount()
    {
        $this->message = 'Message in a bottle 🍾';
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
