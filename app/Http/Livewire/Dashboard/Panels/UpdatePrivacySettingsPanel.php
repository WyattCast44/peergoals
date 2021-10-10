<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdatePrivacySettingsPanel extends Component
{
    public User $user;

    protected function rules(): array
    {
        return [
            'user.peer_code' => ['required', 'min:8', 'max:8', 
                Rule::unique('users', 'peer_code')->ignore(auth()->id())
            ],
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function update()
    {
        //
    }

    public function render()
    {
        return view('livewire.dashboard.panels.update-privacy-settings-panel');
    }
}
