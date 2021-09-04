<?php

namespace App\Policies;

use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScholarshipPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Scholarship $Scholarship): bool
    {
        return true;
    }

    public function create(?User $user): bool
    {
        return $user->is_admin;
    }

    public function update(?User $user, Scholarship $scholarship): bool
    {
        return $user->is_admin;
    }

    public function delete(?User $user, Scholarship $scholarship): bool
    {
        return $user->is_admin;
    }
}
