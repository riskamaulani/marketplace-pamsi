<?php

namespace App\Policies;

use App\Models\User;

class ProdukPolicy
{
    public function viewAny(User $user)
    {
        return $user->status->isPenjual();
    }

    public function catalog(User $user)
    {
        return $user->status->isAdmin();
    }
}
