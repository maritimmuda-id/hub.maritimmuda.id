<?php

namespace App\Http\Requests;

use App\Models\Scholarship;
use Illuminate\Foundation\Http\FormRequest;

class ScholarshipStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'provider_name' => ['required', 'string', 'max:200'],
            'registration_link' => ['required', 'string', 'max:200'],
            'submission_deadline' => ['required'],
            'poster' => ['nullable', 'file', 'image', 'max:1024'],
        ];
    }

    public function attributes(): array
    {
        return Scholarship::attributes();
    }
}
