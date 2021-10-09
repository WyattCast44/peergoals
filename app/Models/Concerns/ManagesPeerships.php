<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ManagesPeerships
{
    // peerships that this user started
    public function peersOfThisUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'peerships', 'first_user_id', 'second_user_id')
            ->withPivot('status')
            ->wherePivot('status', 'confirmed');
    }

    // peerships that this user accepted
	protected function thisUserPeerOf(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'peerships', 'second_user_id', 'first_user_id')
		->withPivot('status')
		->wherePivot('status', 'confirmed');
	}

    // accessor allowing you call $user->peers
    public function getPeersAttribute(): mixed
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

    // peerships that this user started but now blocked
	protected function peersOfThisUserBlocked(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'peerships', 'first_user_id', 'second_user_id')
					->withPivot('status', 'requesting_user_id')
					->wherePivot('status', 'blocked')
					->wherePivot('requesting_user_id', 'first_user_id');
	}

    // peerships that this user was asked for but now blocked
	protected function thisUserPeerOfBlocked(): BelongsToMany
	{
        return $this->belongsToMany(User::class, 'peerships', 'second_user_id', 'first_user_id')
					->withPivot('status', 'requesting_user_id')
					->wherePivot('status', 'blocked')
					->wherePivot('requesting_user_id', 'second_user_id');
	}

    // accessor allowing you call $user->blocked_peers
	public function getBlockedPeersAttribute(): mixed
	{
		if (!array_key_exists('blocked_peers', $this->relations)) {

            if($peers = $this->peersOfThisUserBlocked) {
                $peers->merge($this->thisUserPeerOfBlocked);
            } else {
                $peers = $this->thisUserPeerOfBlocked;
            }

			$this->setRelation('blocked_peers', $peers);
            
        } 

		return $this->getRelation('blocked_peers');
	}

    // get all pending peer requests
    public function peer_requests(): HasMany
    {
        return $this->hasMany(Peership::class, 'second_user_id')
            ->where('status', 'pending');
    }
}