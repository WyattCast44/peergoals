<?php

namespace App\Models\Concerns;

use App\Models\User;
use App\Models\Peership;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ManagesPeerships
{
    // peerships that this user started
    public function peersOfThisUser(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'peerships', 'first_user_id', 'second_user_id')
            ->withPivot('status')
            ->wherePivot('status', 'accepted');
    }

    // peerships that this user accepted
	protected function thisUserPeerOf(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'peerships', 'second_user_id', 'first_user_id')
            ->withPivot('status')
            ->wherePivot('status', 'accepted');
	}

    // accessor allowing you call $user->peers
    public function getPeersAttribute(): mixed
	{
		if (!array_key_exists('peers', $this->relations)) {
            
            $peers = $this->peersOfThisUser;

            if(!$peers->isEmpty()) {
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

            $peers = $this->peersOfThisUserBlocked;

            if(!$peers->isEmpty()) {
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

    // send peer request
    public function sendPeerRequestTo(User $user = null): void
    {
        if($user === null) {
            return;
        }

        // check if user is rqsting themselves
        // if yes do nothing 
        if ($this->id === $user->id) {
            return;
        }

        // check if reciever has blocked the user
        // if yes do nothing
        if($user->blocked_peers->contains($this)) {
            return;
        }

        // check if request already exists
        // if yes update the request and mark 
        // approved, @TODO tmp fix, would like to
        // show the user a request already exists and 
        // they can approve or deny
        if($peership = Peership::where([
            'first_user_id' => $this->id,
            'second_user_id' => $user->id,
        ])->orWhere([
            'first_user_id' => $user->id,
            'second_user_id' => $this->id,
        ])->first()) {
            $peership->update([
                'requesting_user_id' => $this->id,
                'status' => 'accepted'
            ]);
            return;
        }

        // actually create the request
        Peership::create([
            'first_user_id' => $this->id,
            'second_user_id' => $user->id,
            'requesting_user_id' => $this->id,
            'status' => 'pending',
        ]);
    }
}