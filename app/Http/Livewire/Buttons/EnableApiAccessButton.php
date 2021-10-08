<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;

class EnableApiAccessButton extends Component
{
    public function enable()
    {
        auth()->user()->enableApiAccess();

        return redirect()->route('dashboard.account.api');
    }

    public function render()
    {
        return view('livewire.buttons.enable-api-access-button');
    }
}
