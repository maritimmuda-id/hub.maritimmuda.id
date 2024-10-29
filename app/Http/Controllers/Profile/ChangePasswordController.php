<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\RedirectResponse;

class ChangePasswordController
{
    public function __invoke(ChangePasswordRequest $request): RedirectResponse
    {
        $request->processToUpdatePassword();

        toast(trans('profile.change-password-success'), 'success');

        return redirect()->route('profile.edit');
    }

    public function apiChangePass(ChangePasswordRequest $request): JsonResponse
    {
        // Call the method to process the password update
        $request->processToUpdatePassword();

        // Return a success response in JSON format
        return response()->json([
            'success' => true,
            'message' => trans('profile.change-password-success'),
        ], 200);
    }
}
