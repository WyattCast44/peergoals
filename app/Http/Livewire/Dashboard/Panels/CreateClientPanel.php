<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\Client;
use Livewire\Component;

class CreateClientPanel extends Component
{
    public function render()
    {
        return view('livewire.dashboard.panels.create-client-panel');
    }
}
