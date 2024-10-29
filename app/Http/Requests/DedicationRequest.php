<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DedicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan otorisasi Anda
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'role' => ['required', 'string', 'max:200'],
            'institution_name' => ['required', 'string', 'max:200'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }
}
