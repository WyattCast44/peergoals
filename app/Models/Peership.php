<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peership extends Model
{
    use HasFactory;

    protected $table = 'peerships';

    protected $guarded = [];

    const PENDING_STATE = 'pending';
    const ACCEPTED_STATE = 'accepted';
    const DENIED_STATE = 'denied';
    const BLOCKED_STATE = 'blocked';

    /**
     * Relationships
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'requesting_user_id');
    }

    public function reciever()
    {
        return $this->belongsTo(User::class, 'second_user_id');
    }

    /**
     * Abilities
     */
    public function acceptRequest(User $user = null)
    {
        $this->update([
            'requesting_user_id' => ($user) ? $user->id : auth()->id(),
            'status' => 'accepted',
        ]);
    }
}
