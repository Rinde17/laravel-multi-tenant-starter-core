<?php

namespace App\Models;

use Database\Factories\OfficeInvitationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfficeInvitation extends Model
{
    /** @use HasFactory<OfficeInvitationFactory> */
    use HasFactory;

    protected $fillable = [
        'email',
        'office_id',
        'role',
        'token',
        'accepted_at',
        'expires_at',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }

    public function isAccepted(): bool
    {
        return ! is_null($this->accepted_at);
    }
}
