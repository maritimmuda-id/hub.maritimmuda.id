<?php

namespace App\Http\Requests;

use App\Enums\PublicationType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah sesuai kebutuhan otorisasi Anda
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'author_name' => ['required', 'string', 'max:200'],
            'type' => ['required', new EnumValue(PublicationType::class, false)],
            'publisher' => ['required', 'string', 'max:200'],
            'city' => ['required', 'string', 'max:200'],
            'publish_date' => ['required', 'date'],
            'first_page' => ['nullable', 'image', 'max:1024'],
        ];
    }
}
