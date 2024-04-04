<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Models\Province;
use App\Models\User;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Exists;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::check('update', $this->route('user'));
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'gender' => ['required', new EnumValue(Gender::class, false)],
            'province_id' => ['required', new Exists(Province::class, 'id')],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'uid' => ['nullable','string'],
        ];
    }

    public function attributes(): array
    {
        return User::attributes();
    }
}
