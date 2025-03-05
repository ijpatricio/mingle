<?php

namespace App\Livewire;

use Livewire\Component;

class CounterItem extends Component
{
    public function mingleData(): array
    {
        return [
            //
        ];
    }

    public function saveCount($amount)
    {
        dd($amount);
    }
}
