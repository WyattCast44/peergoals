<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\Goal;
use Livewire\Component;

class CreateGoalPanel extends Component
{
    public Goal $goal;

    protected $rules = [
        'goal.body' => ['required', 'string', 'max:5000'],
    ];

    public function mount()
    {
        $this->goal = new Goal;
    }

    public function create()
    {
        $this->validate();
        
        tap($this->goal, function($goal) {
            $goal->user_id = auth()->id();
        })->save();

        session()->flash('success', 'Goal created!');

        $this->emit('goalCreated');

        $this->goal = new Goal;
    }

    public function render()
    {
        return view('livewire.dashboard.panels.create-goal-panel');
    }
}
