<?php

namespace App\Livewire;

use Livewire\Component;

class LivewireCounter extends Component
{
    public int $count = 0;

    public string $message;

    public function mount()
    {
        $this->message = 'Message in a bottle 🍾';
    }

    public function increment($amount = 1)
    {
        $this->count += $amount;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
