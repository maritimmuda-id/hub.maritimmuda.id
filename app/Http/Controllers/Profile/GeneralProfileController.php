<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\GeneralProfileUpdateRequest;
use App\Models\Expertise;
use App\Models\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
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

    public function apiEdit(Request $request): JsonResponse
    {
        
        /** @var \App\Models\User $user */
        $user = $request->user();

        // Get provinces and expertises data
        $provinces = Province::query()->pluck('name', 'id');
        $expertises = Expertise::query()->pluck('name', 'id');

        // Return a JSON response with the user and related data
        return response()->json([
            'user' => $user,
            'provinces' => $provinces,
            'expertises' => $expertises,
        ]);
    }

    public function update(GeneralProfileUpdateRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $user->fill(
            collect($request->validated())->except(['photo', 'identity_card', 'payment_confirm'])->toArray()
        )->save();

        if ($request->hasFile('photo')) {
            $user->addMediaFromRequest('photo')
                ->toMediaCollection('photo');
                toast(trans('profile.update-profile-success'), 'success');
        } 

        if ($request->hasFile('identity_card')) {
            $user->addMediaFromRequest('identity_card')
                ->toMediaCollection('identity_card');
                toast(trans('profile.update-profile-success'), 'success');
        }

        if ($request->hasFile('payment_confirm')) {
            $user->addMediaFromRequest('payment_confirm')
                ->toMediaCollection('payment_confirm');
                toast(trans('profile.update-payment-success'), 'success');
        }

        return redirect()->route('profile.edit');
    }

    public function apiUpdate(GeneralProfileUpdateRequest $request): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        // Memperbarui informasi pengguna
        $user->fill(
            collect($request->validated())->except(['photo', 'identity_card', 'payment_confirm'])->toArray()
        )->save();

        // Menangani unggahan file jika ada
        $responses = [];
        
        if ($request->hasFile('photo')) {
            $user->addMediaFromRequest('photo')
                ->toMediaCollection('photo');
            $responses['photo'] = trans('profile.photo-upload-success');
        } 

        if ($request->hasFile('identity_card')) {
            $user->addMediaFromRequest('identity_card')
                ->toMediaCollection('identity_card');
            $responses['identity_card'] = trans('profile.identity-card-upload-success');
        }

        if ($request->hasFile('payment_confirm')) {
            $user->addMediaFromRequest('payment_confirm')
                ->toMediaCollection('payment_confirm');
            $responses['payment_confirm'] = trans('profile.payment-confirm-upload-success');
        }

        // Mengembalikan respons sukses
        return response()->json([
            'success' => true,
            'message' => trans('profile.update-profile-success'),
            'data' => $responses
        ], 200);
    }
}
