<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\Goal;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class CreateGoalPanel extends Component
{
    public Goal $goal;

    public $search = "";

    public Collection $availablePeers;

    public Collection $selectedPeers;

    protected $rules = [
        'goal.body' => ['required', 'string', 'max:5000'],
    ];

    public function mount()
    {
        $this->goal = new Goal;

        $this->selectedPeers = new Collection;

        $this->availablePeers = auth()->user()->peers;
    }

    public function addPeerToGoal($peerId)
    {
        if(!$this->availablePeers->contains($peerId)) {
            return;
        }
        
        $this->selectedPeers = $this->selectedPeers->push(User::find($peerId));

        $this->availablePeers = $this->availablePeers->filter(function($peer) use ($peerId) {
            return !($peer->id === $peerId);
        });
    }

    public function updatedSearch($value)
    {
        if(trim($value) == "") {
            $this->availablePeers = auth()->user()->peers->filter(function($peer) {
                return !$this->selectedPeers->contains($peer->id);
            }); 
            return;
        }

        $this->availablePeers = auth()->user()->peers->filter(function($peer) {
            return !$this->selectedPeers->contains($peer);
        })->filter(function($peer) use ($value) {
            return Str::contains(Str::lower($peer->name), $value);
        });
    }

    public function create()
    {
        $this->validate();
        
        tap($this->goal, function($goal) {
            $goal->user_id = auth()->id();
        })->save();

        $this->selectedPeers->each(function($peerId) {
            $this->goal->peers()->attach($peerId);
        });

        session()->flash('success', 'Goal created!');

        $this->emit('goalCreated');

        $this->goal = new Goal;
        $this->selectedPeers = new Collection;
        $this->availablePeers = auth()->user()->peers;
    }

    public function render()
    {
        return view('livewire.dashboard.panels.create-goal-panel');
    }
}
