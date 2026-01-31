<?php

namespace App\Policies;

use App\Models\Office;
use App\Models\OfficeInvitation;
use App\Models\User;

class OfficeInvitationPolicy
{
    public function create(User $user, Office $office): bool
    {
        return $user->office_id === $office->id
            && $user->hasAnyRole(['owner', 'admin']);
    }

    public function delete(User $user, OfficeInvitation $invitation): bool
    {
        return $user->office_id === $invitation->office_id
            && $user->hasAnyRole(['owner', 'admin']);
    }
}
