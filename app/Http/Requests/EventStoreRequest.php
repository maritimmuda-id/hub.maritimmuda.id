<?php

namespace App\Http\Requests;

use App\Enums\EventType;
use App\Models\Event;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:200'],
            'organizer_name' => ['required', 'string', 'max:200'],
            'type' => ['required', new EnumValue(EventType::class, false)],
            'external_url' => ['nullable', 'url', 'string', 'max:200'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'poster' => ['nullable', 'file', 'image', 'max:1024'],
        ];
    }

    public function attributes(): array
    {
        return Event::attributes();
    }
}
