<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GeneralProfileController
{
    public function edit(Request $request): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        toast(trans('profile.update-profile-success'), 'success');

        return view('profile.general', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $validatedData = $request->validate([
            'name' => ['required', 'min:2', 'max:200'],
        ]);

        $user->update($validatedData);

        return redirect()->route('profile.edit');
    }
}
