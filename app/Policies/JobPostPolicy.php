<?php

namespace App\Policies;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, JobPost $jobPost): bool
    {
        return true;
    }

    public function create(?User $user): bool
    {
        return $user->is_admin;
    }

    public function update(?User $user, JobPost $jobPost): bool
    {
        return $user->is_admin;
    }

    public function delete(?User $user, JobPost $jobPost): bool
    {
        return $user->is_admin;
    }
}
