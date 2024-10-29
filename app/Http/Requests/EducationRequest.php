<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan otorisasi Anda
    }

    public function rules(): array
    {
        return [
            'institution_name' => ['required', 'string', 'max:200'],
            'major' => ['required', 'string', 'max:200'],
            'level' => ['required', 'integer'], // Ubah sesuai enum jika diperlukan
            'graduation_date' => ['required', 'date'],
        ];
    }
}
