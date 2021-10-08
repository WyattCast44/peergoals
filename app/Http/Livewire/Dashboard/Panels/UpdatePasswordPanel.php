<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdatePasswordPanel extends Component
{
    public string $current_password = "";

    public string $new_password = "";

    public string $new_password_confirmation = "";

    public function update()
    {
        $this->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'confirmed'],
        ]);

        if(! Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('current_password', 'Password does not match current password. Please try again.');
            return;
        }

        auth()->user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password updated!');

        $this->current_password = "";
        $this->new_password = "";
        $this->new_password_confirmation = "";

        return;
    }

    public function render()
    {
        return view('livewire.dashboard.panels.update-password-panel');
    }
}
