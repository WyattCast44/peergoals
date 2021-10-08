<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VerifyEmail extends Component
{
    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard'));
        }
    }

    public function resend()
    {
        Auth::user()->sendEmailVerificationNotification();

        $this->emit('resent');

        session()->flash('resent');
    }

    public function render()
    {
        return view('auth.verify-email')
            ->extends('layouts.auth')
            ->section('content');
    }
}
