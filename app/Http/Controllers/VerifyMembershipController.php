<?php

namespace App\Http\Controllers;

use App\Models\User;

class VerifyMembershipController
{
    public function __invoke(User $user)
    {
        $user->loadCount('membership');

        if ($user->membership_count === 0) {
            abort(404);
        }

        return view('member.detail', compact('user'));
    }
}
