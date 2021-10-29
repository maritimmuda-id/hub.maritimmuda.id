<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewMemberCardController
{
    public function __invoke(Request $request, ?User $user): View
    {
        if ($request->ip() !== '127.0.0.1') {
            abort(403, 'Allowed request from localhost only');
        }

        return view('profile.member-card.frontside', compact('user'));
    }
}
