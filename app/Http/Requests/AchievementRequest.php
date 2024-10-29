<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan otorisasi Anda
    }

    public function rules(): array
    {
        return [
            'award_name' => ['required', 'string', 'max:200'],
            'appreciator' => ['required', 'string', 'max:200'],
            'event_name' => ['required', 'string', 'max:200'],
            'event_level' => ['required', 'string', 'max:200'],
            'achieved_at' => ['required', 'date'],
        ];
    }
}
