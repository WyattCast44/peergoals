<?php

namespace App\Http\Livewire\Dashboard\Panels;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ManageApiTokensPanel extends Component
{
    public Collection $tokens;

    protected $listeners = ['apiTokenCreated' => 'queryTokens'];

    public function mount()
    {
        $this->queryTokens();
    }

    public function deleteToken($tokenId)
    {
        $token = auth()->user()->tokens()->find($tokenId);

        if($token) {
            $token->delete();

            $this->queryTokens();
        }
    }

    public function queryTokens()
    {
        $this->tokens = auth()->user()->tokens()->latest()->get();
    }

    public function render()
    {
        return view('livewire.dashboard.panels.manage-api-tokens-panel');
    }
}
