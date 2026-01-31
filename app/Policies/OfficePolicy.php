<?php

namespace App\Policies;

use App\Models\Office;
use App\Models\User;

class OfficePolicy
{
    public function manage(User $user, Office $office): bool
    {
        return $user->office_id === $office->id
            && $user->hasAnyRole(['owner', 'admin']);
    }
}
