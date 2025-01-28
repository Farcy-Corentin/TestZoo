<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ServicesPolicy extends Gate
{
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user): bool
    {
        return in_array($user->role, ['admin', 'employee']);
    }

    public function view(User $user): bool
    {
        return in_array($user->role, ['admin', 'employee']);
    }

    public function delete(User $user): bool
    {
        return $user->role === 'admin';
    }
}
