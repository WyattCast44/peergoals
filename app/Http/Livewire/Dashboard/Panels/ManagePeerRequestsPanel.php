<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;
use App\Models\Peership;
use Illuminate\Database\Eloquent\Collection;

class ManagePeerRequestsPanel extends Component
{
    public Collection $requests;

    public function mount()
    {
        $this->queryRequests();
    }

    public function approve($peershipId)
    {
        Peership::find($peershipId)->update([
            // 'requesting_user_id' => auth()->id(),
            'status' => 'approved',
        ]);

        $this->queryRequests();
    }

    public function queryRequests()
    {
        $this->requests = auth()->user()
            ->load(['peer_requests', 'peer_requests.sender'])
            ->peer_requests;
    }

    public function render()
    {
        return view('livewire.dashboard.panels.manage-peer-requests-panel');
    }
}
