<?php

namespace App\Policies;

use App\Models\Kategori;
use App\Models\User;

class KategoriPolicy
{

    public function category(User $user)
    {
        return $user->status->isAdmin();
    }

    
}
