<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'public' => 'boolean',
        'email_verified_at' => 'datetime',
        'api_disclaimer_accepted_at' => 'datetime',
        'terms_and_privacy_accepted_at' => 'datetime',
    ];

    /**
     * Configuration, lifecyle hooks, etc
     */
    protected static function booted(): void
    {
        static::created(function ($user) {
            $user->update([
                'peer_code' => Hashids::encode($user->id),
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Accessors, mutators
     */
    public function getAvatarUrlAttribute()
    {
        if($this->avatar) {
            return Storage::url($this->avatar);
        }

        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=100&d=mp';
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

    public function isPublic(): bool
    {
        return $this->public;
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

    // peerships that this user started
    public function peersOfThisUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'peerships', 'first_user_id', 'second_user_id')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }

    // peerships that this user accepted
	protected function thisUserPeerOf()
	{
		return $this->belongsToMany(User::class, 'peerships', 'second_user_id', 'first_user_id')
		->withPivot('status')
		->wherePivot('status', 'confirmed');
	}

    // accessor allowing you call $user->peers
    public function getPeersAttribute()
	{
		if (!array_key_exists('peers', $this->relations)) {
            
            if($peers = $this->peersOfThisUser) {
                $peers->merge($this->thisUserPeerOf);
            } else {
                $peers = $this->thisUserPeerOf;
            }

            $this->setRelation('peers', $peers);            

        }

		return $this->getRelation('peers');
	}
}
