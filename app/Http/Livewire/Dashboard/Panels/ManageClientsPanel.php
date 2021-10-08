<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ManageClientsPanel extends Component
{
    // public Collection $clients;

    // protected $listeners = ['clientCreated' => 'queryClients'];

    // public function mount()
    // {
    //     $this->queryClients();
    // }

    // public function deleteClient($clientId)
    // {
    //     $client = auth()->user()->clients()->find($clientId);

    //     if($client) {
    //         $client->delete();

    //         $this->queryClients();
    //     }
    // }

    // public function queryClients()
    // {
    //     $this->clients = auth()->user()->clients()->orderBy('name')->get();
    // }
    
    public function render()
    {
        return view('livewire.dashboard.panels.manage-clients-panel');
    }
}
