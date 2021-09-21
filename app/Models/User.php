<?php

namespace App\Models;

use App\Enums\Gender;
use App\Models\Concerns\HasUuid;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia, HasLocalePreference, MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasUuid;
    use Impersonate;
    use InteractsWithMedia;
    use MustVerifyEmailTrait;
    use Notifiable;

    protected $fillable = [
        'uid',
        'name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'place_of_birth',
        'date_of_birth',
        'linkedin_profile',
        'instagram_profile',
        'province_id',
        'first_expertise_id',
        'second_expertise_id',
        'permanent_address',
        'residence_address',
        'bio',
        'locale',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'is_admin' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile()
            ->useFallbackUrl("https://ui-avatars.com/api/?format=jpg&background=ebedef&size=128&name={$this->name}");

        $this->addMediaCollection('identity_card')
            ->singleFile()
            ->useFallbackUrl("https://via.placeholder.com/856x540/fff/1f90ff?text=No%20Identity%20Card");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('identity_card')
            ->performOnCollections('identity_card')
            ->setManipulations(
                Manipulations::create()
                    ->watermark(storage_path('app/watermark.png'))
                    ->watermarkOpacity(50)
                    ->watermarkPosition(Manipulations::POSITION_CENTER)
                    ->watermarkHeight(100, Manipulations::UNIT_PERCENT)
                    ->watermarkWidth(100, Manipulations::UNIT_PERCENT)
            )
            ->nonQueued();

        $this->addMediaConversion('photo')
            ->performOnCollections('photo')
            ->queued()
            ->fit(Manipulations::FIT_CROP, 300, 400);

        $this->addMediaConversion('thumb')
            ->performOnCollections('photo')
            ->queued()
            ->fit(Manipulations::FIT_CROP, 500, 500);
    }

    public function achievementHistories(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(AchievementHistory::class)
            ->ordered();
    }

    public function dedications(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(Dedication::class)
            ->ordered();
    }

    public function educationHistories(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(EducationHistory::class)
            ->ordered();
    }

    public function organizationHistories(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(OrganizationHistory::class)
            ->ordered();
    }

    public function publications(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(Publication::class)
            ->ordered();
    }

    public function researchs(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(Research::class)
            ->ordered();
    }

    public function workExperiences(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(WorkExperience::class)
            ->ordered();
    }

    public function province(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(Province::class);
    }

    public function firstExpertise(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(Expertise::class)
            ->withDefault(['name' => '-']);
    }

    public function secondExpertise(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(Expertise::class)
            ->withDefault(['name' => '-']);
    }

    public function getBioFormattedAttribute(): string
    {
        return $this->bio ?? '-';
    }

    public function getPhotoLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('photo', 'photo');
    }

    public function getIdentityCardLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('identity_card', 'identity_card');
    }

    public function getPhotoThumbLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('photo', 'thumb');
    }

    public function preferredLocale(): ?string
    {
        return $this->locale;
    }

    public function canImpersonate(): bool
    {
        return $this->is_admin;
    }

    public function canBeImpersonated(): bool
    {
        return ! $this->is_admin;
    }

    public static function attributes(): array
    {
        return [
            'name' => trans('profile.name-label'),
            'gender' => trans('profile.gender-label'),
            'photo' => trans('profile.photo-label'),
            'password' => trans('profile.password-label'),
            'current_password' => trans('profile.current-password-label'),
            'new_password' => trans('profile.new-password-label'),
            'new_password_confirmation' => trans('profile.new-password-confirmation-label'),
            'place_of_birth' => trans('profile.place-of-birth-label'),
            'date_of_birth' => trans('profile.date-of-birth-label'),
            'linkedin_profile' => trans('profile.linkedin-profile-label'),
            'instagram_profile' => trans('profile.instagram-profile-label'),
            'province_id' => trans('profile.province-id-label'),
            'first_expertise_id' => trans('profile.first-expertise-id-label'),
            'second_expertise_id' => trans('profile.second-expertise-id-label'),
            'permanent_address' => trans('profile.permanent-address-label'),
            'residence_address' => trans('profile.residence-address-label'),
            'bio' => trans('profile.bio-label'),
        ];
    }
}
