<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Wyattcast44\SafeUsername\Rules\AllowedUsername;

class Register extends Component
{
    public $name = "";

    public $username = "";
    
    public $email = "";

    public $password = "";

    public $password_confirmation = "";

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'username' => [
                'required', 'string', 'alpha_num', 'min:2', 'max:255', 'unique:users,username', new AllowedUsername
            ],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
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
