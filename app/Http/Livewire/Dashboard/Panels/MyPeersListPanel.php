<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class MyPeersListPanel extends Component
{
    public Collection $peers;

    protected $listeners = ['peerAdded' => 'queryPeers'];

    public function mount()
    {
        $this->queryPeers();    
    }

    public function queryPeers()
    {
        $this->peers = auth()->user()->peers;
    }
    
    public function render()
    {
        return view('livewire.dashboard.panels.my-peers-list-panel');
    }
}
