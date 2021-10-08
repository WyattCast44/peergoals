<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Authenticated;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;

class Login extends Component
{
    use WithRateLimiting;
    
    public $email = "";

    public $password = "";

    public function authenticate()
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            $this->addError('auth', "Slow down! Please wait another $exception->secondsUntilAvailable seconds to attempt to log in.");
            return;
        }

        $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        $status = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], true);

        event(new Authenticated('web', User::where('email', $this->email)->first()));

        if ($status) {
            return redirect()->intended(route('dashboard'));
        } else {
            $this->addError('auth', 'The given email/password combo did not match any accounts, please try again.');
        }
    }

    public function render()
    {
        return view('auth.login')
            ->extends('layouts.auth')
            ->section('content');
    }
}
