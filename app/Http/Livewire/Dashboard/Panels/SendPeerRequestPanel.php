<?php

namespace App\Http\Livewire\Dashboard\Panels;

use App\Models\User;
use Livewire\Component;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class SendPeerRequestPanel extends Component
{
    use WithRateLimiting;
    
    public $code = "";

    public function sendRequest()
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError('error', "Slow down! Please wait another $exception->secondsUntilAvailable seconds before sending new request.");
            return;
        }

        $this->validate([
            'code' => ['required', 'exists:users,peer_code']
        ]);

        auth()->user()->sendPeerRequestTo(
            User::where('peer_code', $this->code)->first()
        );

        $this->code = "";
    }

    public function render()
    {
        return view('livewire.dashboard.panels.send-peer-request-panel');
    }
}
