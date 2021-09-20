<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', Password::default(), 'confirmed'],
        ];
    }

    public function attributes(): array
    {
        return User::attributes();
    }

    public function processToUpdatePassword(): void
    {
        /** @var \App\Models\User $user */
        $user = $this->user();
        $user->forceFill(['password' => $this->get('new_password')])
            ->save();
    }
}
