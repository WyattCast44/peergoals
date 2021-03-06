<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'public' => 'boolean',
        'complete' => 'boolean',
        'due_at' => 'datetime',
    ];

    /**
     * Scopes
     */
    public function scopeOpen(Builder $query): Builder
    {
        return $query->where('complete', false);
    }
    
    public function scopePrivate(Builder $query): Builder
    {
        return $query->where('public', false);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('public', true);
    }

    /**
     * Relationships
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function peers()
    {
        return $this->belongsToMany(User::class, 'goal_peers', 'goal_id', 'user_id');
    }
}
