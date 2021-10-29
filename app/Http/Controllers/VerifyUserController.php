<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateMemberCardJob;
use App\Models\User;
use Illuminate\Http\Request;

class VerifyUserController
{
    public function __invoke(User $user)
    {
        $user->load('membership');

        if (is_null($user->membership)) {
            GenerateMemberCardJob::dispatch($user);

            toast(__('Membership successfully verified'));
        }

        return redirect()->route('user.edit', $user);
    }
}
