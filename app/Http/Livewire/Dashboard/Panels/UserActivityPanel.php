<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;

class UserActivityPanel extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user();
    }
    
    public function render()
    {
        return view('livewire.dashboard.panels.user-activity-panel');
    }
}
