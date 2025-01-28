<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ReviewsPolicy extends Gate
{
    public function update(User $user): bool
    {
        return $user->role === 'employee';
    }

    public function view(User $user): bool
    {
        return $user->role === 'employee';
    }
}
