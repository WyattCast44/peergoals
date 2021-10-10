<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ManageGoalsPanel extends Component
{
    public Collection $goals;

    protected $listeners = ['goalCreated' => 'queryGoals'];

    public function mount()
    {
        $this->queryGoals();
    }

    public function deleteGoal($goalId)
    {
        $goal = auth()->user()->goals()->find($goalId);

        if($goal) {
            $goal->delete();

            $this->queryGoals();
        }
    }

    public function markComplete($goalId)
    {
        $goal = auth()->user()->goals()->find($goalId);

        if($goal) {
            $goal->update([
                'complete' => true,
            ]);

            $this->queryGoals();
        }
    }
    public function queryGoals()
    {
        $this->goals = auth()->user()->goals()->open()->latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard.panels.manage-goals-panel');
    }
}
