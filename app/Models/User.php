<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Impersonate;
    use InteractsWithMedia;

    protected $fillable = [
        'uid',
        'name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'linkedin_profile',
        'instagram_profile',
        'province_id',
        'first_expertise_id',
        'second_expertise_id',
        'bio',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile()
            ->useFallbackUrl("https://ui-avatars.com/api/?format=jpg&size=128&name={$this->name}");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('photo')
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

    public function getPhotoLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('photo');
    }

    public function getPhotoThumbLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('photo', 'thumb');
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
            'password' => trans('profile.password-label'),
            'linkedin_profile' => trans('profile.linkedin-profile-label'),
            'instagram_profile' => trans('profile.instagram-profile-label'),
            'province_id' => trans('profile.province-id-label'),
            'first_expertise_id' => trans('profile.first-expertise-id-label'),
            'second_expertise_id' => trans('profile.second-expertise-id-label'),
            'bio' => trans('profile.bio-label'),
        ];
    }
}
