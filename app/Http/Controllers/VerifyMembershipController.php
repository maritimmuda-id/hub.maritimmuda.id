<?php

namespace App\Http\Controllers;

use App\Models\User;

class VerifyMembershipController
{
    public function __invoke(?string $id)
    {
        $user = User::query()
            ->has('membership', '=', 1)
            ->where('uid', $id)
            ->firstOrFail();

        return view('member.detail', compact('user'));
    }
}
