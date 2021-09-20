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
}
