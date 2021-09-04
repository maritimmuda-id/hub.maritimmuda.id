<?php

namespace App\Http\Requests;

use App\Models\JobPost;
use Illuminate\Foundation\Http\FormRequest;

class JobPostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'position_title' => ['required', 'string', 'max:200'],
            'company_name' => ['required', 'string', 'max:200'],
            'type' => ['required', 'integer'],
            'link' => ['required', 'string', 'max:200'],
            'application_closed_at' => ['required'],
            'poster' => ['nullable', 'file', 'image', 'max:1024'],
        ];
    }

    public function attributes(): array
    {
        return JobPost::attributes();
    }
}
