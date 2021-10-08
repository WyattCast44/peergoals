<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;

class CreateApiTokenPanel extends Component
{
    public string $name = "";

    public function create()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        $token = auth()->user()->createToken($this->name, ['*'])->plainTextToken;

        session()->flash('token', $token);

        $this->emit('apiTokenCreated');

        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.dashboard.panels.create-api-token-panel');
    }
}
