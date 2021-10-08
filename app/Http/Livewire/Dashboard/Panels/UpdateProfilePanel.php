<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class UpdateProfilePanel extends Component
{    
    public User $user;

    protected function rules(): array
    {
        return [
            'user.name' => ['required', 'min:2', 'max:255'],
            'user.email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function update()
    {
        $this->validate();

        if($this->user->isDirty()) {
            $this->user->save();

            $this->dispatchBrowserEvent('user-name-updated', ['name' => $this->user->name]);
         
            session()->flash('success', 'Profile updated!');
        }

        return;
    }

    public function render()
    {
        return view('livewire.dashboard.panels.update-profile-panel');
    }
}
