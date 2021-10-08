<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    protected static function booted(): void
    {
        static::created(function ($user) {
            $user->update([
                'peer_code' => Hashids::encode($user->id),
            ]);
        });
    }

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
    
    /**
     * Relationships
     */
    public function goals(): HasMany
    {
        return $this->hasMany(Goal::class);
    }

    /**
     * Configuration, Misc
     */
    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    // public function sendPasswordResetNotification(string $token): void
    // {
    //     $url = 'https://example.com/reset-password?token='.$token;

    //     $this->notify(new ResetPasswordNotification($url));
    // }
}
