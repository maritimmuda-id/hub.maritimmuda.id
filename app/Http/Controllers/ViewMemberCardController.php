<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewMemberCardController
{
    public function __invoke(Request $request, ?User $user): View
    {
        $user->loadCount('membership');

        if (! $this->isLocalAddress($request->ip())) {
            abort(403, 'Allowed request from localhost only');
        }

        if ($user->membership_count === 0) {
            abort(404);
        }

        return view('profile.member-card.frontside', compact('user'));
    }

    private function isLocalAddress(string $ip): bool
    {
        return empty(
            filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
        );
    }
}
