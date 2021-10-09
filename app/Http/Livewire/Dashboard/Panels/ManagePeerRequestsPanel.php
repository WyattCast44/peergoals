<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;

class ManagePeerRequestsPanel extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = auth()->user()->load(['peer_requests', 'peer_requests.sender']);
    }

    public function render()
    {
        return view('livewire.dashboard.panels.manage-peer-requests-panel');
    }
}
