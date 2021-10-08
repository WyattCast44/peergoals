<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use TwoFactorAuthenticatable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'api_disclaimer_accepted_at' => 'datetime',
        'terms_and_privacy_accepted_at' => 'datetime',
    ];

    /**
     * Abilities, affordances, checks
     */
    public function apiEnabled(): bool
    {
        return (bool) $this->api_disclaimer_accepted_at;
    }

    public function enableApiAccess(): void
    {
        $this->update([
            'api_disclaimer_accepted_at' => now(),
        ]);
    }

    public function twoFactorAuthEnabled(): bool
    {
        return (bool) $this->two_factor_secret;
    }
}
