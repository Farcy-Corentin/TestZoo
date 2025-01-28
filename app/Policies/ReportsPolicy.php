<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VeterinarianReport;
use Illuminate\Support\Facades\Gate;

class ReportsPolicy extends Gate
{
    public function create(User $user): bool
    {
        return $user->role === 'veterinarian';
    }

    public function update(User $user, VeterinarianReport $veterinarianReport): bool
    {
        return $user->id === $veterinarianReport->user_id;
    }

    public function delete(User $user, VeterinarianReport $veterinarianReport): bool
    {
        return $user->id === $veterinarianReport->user_id;
    }

    public function view(User $user): bool
    {
        return in_array($user->role, ['veterinarian', 'admin']);
    }
}
