<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Authenticated;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    use WithRateLimiting;
    
    public $email = "";

    public $password = "";

    public function authenticate()
    {
        try {
            $this->rateLimit(10);
        } catch (TooManyRequestsException $exception) {
            $this->addError('auth', "Slow down! Please wait another $exception->secondsUntilAvailable seconds to attempt to log in.");
            return;
        }

        $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $this->email)->first();

        $success = false;

        // need to check if email/pass combo work without authenticating
        // if not, just show errors
        // if they do, proceed to two factor auth challenge
        // the login id and remember are stored in session so we can do things after
        if($user && Hash::check($this->password, $user->password)) {
            $success = true;
        }

        if(!$success) {
            $this->addError('auth', 'The given email/password combo did not match any accounts, please try again.');

            return;
        } 

        session()->put([
            'login.id' => $user->getKey(),
            'login.remember' => true,
        ]);

        if($user->twoFactorAuthEnabled()) {
            return redirect()->route('two-factor.login');        
        } else {
            Auth::attempt([
                'email' => $this->email,
                'password' => $this->password
            ], true);

            event(new Authenticated('web', User::where('email', $this->email)->first()));
            
            return redirect()->intended(route('dashboard'));
        }
    }

    public function render()
    {
        return view('auth.login')
            ->extends('layouts.auth')
            ->section('content');
    }
}
