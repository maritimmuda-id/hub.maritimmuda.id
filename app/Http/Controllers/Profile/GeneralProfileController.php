<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\GeneralProfileUpdateRequest;
use App\Models\Expertise;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GeneralProfileController
{
    public function edit(Request $request): View
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $provinces = Province::query()->pluck('name', 'id');
        $expertises = Expertise::query()->pluck('name', 'id');

        return view('profile.general', compact('user', 'provinces', 'expertises'));
    }

    public function update(GeneralProfileUpdateRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->fill(
            collect($request->validated())->except(['photo', 'identity_card'])->toArray()
        )->save();

        if ($request->hasFile('photo')) {
            $user->addMediaFromRequest('photo')
                ->toMediaCollection('photo');
        }

        if ($request->hasFile('identity_card')) {
            $user->addMediaFromRequest('identity_card')
                ->toMediaCollection('identity_card');
        }

        toast(trans('profile.update-profile-success'), 'success');

        return redirect()->route('profile.edit');
    }
}
