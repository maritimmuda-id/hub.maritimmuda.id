<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $authenticatedUser): bool
    {
        return true;
    }

    public function view(?User $authenticatedUser, User $user): bool
    {
        return true;
    }

    public function create(?User $authenticatedUser): bool
    {
        return false;
    }

    public function update(?User $authenticatedUser, User $user): bool
    {
        return false;
    }

    public function delete(?User $authenticatedUser, User $user): Response | bool
    {
        if ($user->id === $authenticatedUser->id) {
            return Response::deny(trans('users.cannot-delete-current-user'));
        }

        return $authenticatedUser->is_admin;
    }
}
