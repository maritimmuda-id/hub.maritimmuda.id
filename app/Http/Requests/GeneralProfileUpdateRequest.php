<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use App\Models\Province;
use App\Models\Expertise;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Zhanang19\LaravelRules\Rules\LinkedinUrl;

class GeneralProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:200'],
            'linkedin_profile' => ['nullable', 'url', 'max:200', new LinkedinUrl()],
            'instagram_profile' => ['nullable', 'url', 'max:200'],
            'gender' => ['required', new EnumValue(Gender::class, false)],
            'photo' => ['nullable', 'image', 'max:1024'],
            'identity_card' => ['nullable', 'image', 'max:4096'],
            'place_of_birth' => ['nullable', 'string', 'max:200'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'first_expertise_id' => ['required', Rule::exists((new Expertise())->getTable(), 'id')],
            'second_expertise_id' => ['required', Rule::exists((new Expertise())->getTable(), 'id'), 'different:first_expertise_id'],
            'permanent_address' => ['nullable', 'string', 'max:300'],
            'residence_address' => ['nullable', 'string', 'max:300'],
            'bio' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function attributes(): array
    {
        return User::attributes();
    }

    public function prepareForValidation(): void
    {
        $this->prepareLinkedinProfileValue();
        $this->prepareInstagramProfileValue();
    }

    private function prepareLinkedinProfileValue(): void
    {
        $linkedinProfile = $this->get('linkedin_profile');

        if (is_null($linkedinProfile)) {
            return;
        }

        if (Str::startsWith($linkedinProfile, '@')) {
            $linkedinProfile = ltrim($linkedinProfile, '@');
        }

        if (! Str::startsWith($linkedinProfile, ['https://', 'http://'])) {
            $this->merge([
                'linkedin_profile' => "https://www.linkedin.com/in/{$linkedinProfile}",
            ]);
        }
    }

    private function prepareInstagramProfileValue(): void
    {
        $instagramProfile = $this->get('instagram_profile');

        if (is_null($instagramProfile)) {
            return;
        }

        if (Str::startsWith($instagramProfile, '@')) {
            $instagramProfile = ltrim($instagramProfile, '@');
        }

        if (! Str::startsWith($instagramProfile, ['https://', 'http://'])) {
            $this->merge([
                'instagram_profile' => "https://www.instagram.com/{$instagramProfile}",
            ]);
        }
    }
}
