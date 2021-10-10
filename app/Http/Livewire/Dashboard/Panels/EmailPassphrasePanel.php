<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;
use Illuminate\Support\Str;

class EmailPassphrasePanel extends Component
{
    public $email_passphrase;

    public function mount()
    {
        $this->email_passphrase = auth()->user()->email_passphrase;
    }
    
    public function save()
    {
        $this->validate([
            'email_passphrase' => ['nullable', 'string', 'min:3', 'max:255'],
        ]);

        if($this->email_passphrase != "") {
            auth()->user()->update([
                'email_passphrase' => $this->email_passphrase,
            ]);
    
            session()->flash('success', 'Passphrase updated!');
            
        } else {
            auth()->user()->update([
                'email_passphrase' => null,
            ]);

            session()->flash('success', 'Passphrase removed!');
        }

    }

    public function updatedEmailPassphrase($value)
    {
        $this->email_passphrase = Str::slug(trim($value));
    }

    public function render()
    {
        return view('livewire.dashboard.panels.email-passphrase-panel');
    }
}
