<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class FoodsConsumPolicy extends Gate
{
    public function create(User $user): bool
    {
        return $user->role === 'employee';
    }

    public function delete(User $user): bool
    {
        return $user->role === 'employee';
    }

    public function view(User $user): bool
    {
        return in_array($user->role, ['employee', 'admin']);
    }
}
