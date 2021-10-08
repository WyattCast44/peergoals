<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    public $name = "";

    public $email = "";

    public $password = "";

    public $password_confirmation = "";

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8', Password::min(8)],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'terms_and_privacy_accepted_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user, $remember = true);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('auth.register')
            ->extends('layouts.auth')
            ->section('content');
    }
}
