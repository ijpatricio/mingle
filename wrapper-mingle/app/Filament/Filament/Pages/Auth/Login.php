<?php

namespace App\Filament\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;

class Login extends BasePage
{
    public function mount(): void
    {
        parent::mount();
        $this->form->fill([
            'email' => 'demo@minglejs.unitedbycode.com',
            'password' => 'password',
            'remember' => true,
        ]);
    }
}
