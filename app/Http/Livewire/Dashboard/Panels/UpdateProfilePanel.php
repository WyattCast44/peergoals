<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Wyattcast44\SafeUsername\Rules\AllowedUsername;

class UpdateProfilePanel extends Component
{    
    use WithFileUploads;

    public User $user;

    public $new_avatar = null;

    protected function rules(): array
    {
        return [
            'user.name' => ['required', 'min:2', 'max:255'],
            'user.username' => ['required', 'alpha_num', 'min:2', 'max:255', 
                new AllowedUsername,
                Rule::unique('users', 'username')->ignore(auth()->id())],
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

    public function updatedNewAvatar()
    {
        $this->validate([
            'new_avatar' => ['nullable', 'image', 'max:5000'],
        ]);

        if ($this->new_avatar) {

            $filename = $this->new_avatar->storePublicly('avatars', 'public');

            $this->user->update([
                'avatar' => $filename,
            ]);

            $this->dispatchBrowserEvent('user-avatar-updated', ['avatar' => $this->user->avatar_url]);

            session()->flash('success', 'Avatar updated!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.panels.update-profile-panel');
    }
}
