<?php

namespace App\Livewire;

use Livewire\Component;

class LivewireCounter extends Component
{
    public int $count = 0;

    public function increment($amount = 1)
    {
        $this->count += $amount;
    }

    public function render()
    {
        return view('livewire.livewire-counter');
    }
}
