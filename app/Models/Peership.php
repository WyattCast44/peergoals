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
}
