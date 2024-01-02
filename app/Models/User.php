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
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\HtmlString;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
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
    use LogsActivity;
    use MustVerifyEmailTrait;
    use Notifiable;

    protected $fillable = [
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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();

        $this->addMediaCollection('identity_card')
            ->singleFile();

        $this->addMediaCollection('payment_confirm')
            ->singleFile();
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
            ->queued();

        $this->addMediaConversion('photo')
            ->performOnCollections('photo')
            ->setManipulations(
                Manipulations::create()
                    ->fit(Manipulations::FIT_CROP, 300, 400)
            )
            ->queued();

        $this->addMediaConversion('payment_confirm')
            ->performOnCollections('payment_confirm')
            ->queued();

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

    public function latestMembership(): HasOne | Eloquent\Builder | Query\Builder
    {
        return $this->hasOne(Membership::class)
            ->latestOfMany();
    }

    public function membership(): HasOne | Eloquent\Builder | Query\Builder
    {
        return $this->hasOne(Membership::class)
            ->ofMany([
                    'id' => 'max',
                ],
                function (Eloquent\Builder | Query\Builder $query) {
                    $query->where('expired_at', '>', now());
                }
            );
    }

    public function memberships(): HasMany | Eloquent\Builder | Query\Builder
    {
        return $this->hasMany(Membership::class);
    }

    public function getBioFormattedAttribute(): string
    {
        return $this->bio ?? '-';
    }

    public function getPhotoLinkAttribute(): string
    {
        return $this->getPhotoLinkForConversion('photo');
    }

    public function getPhotoThumbLinkAttribute(): string
    {
        return $this->getPhotoLinkForConversion('thumb');
    }

    private function getPhotoLinkForConversion(string $conversionName): string
    {
        /** @var ?string $name */
        $name = $this->getAttribute('name');
        $media = $this->getFirstMedia('photo');

        $defaultAvatar = "https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg";

        // if (! empty($name)) {
        //     $defaultAvatar .= "&name={$name}";
        // }

        if (is_null($media)) {
            return $defaultAvatar;
        }

        if (! $media?->hasGeneratedConversion($conversionName)) {
            return $defaultAvatar;
        }

        return $media->getUrl($conversionName);
    }

    public function isProcessingIdentityCard(): bool
    {
        $media = $this->getFirstMedia('identity_card');

        if (is_null($media)) {
            return false;
        }

        if (! $media->hasGeneratedConversion('identity_card')) {
            return true;
        }

        return false;
    }

    public function getIdentityCardLinkAttribute(): string
    {
        $media = $this->getFirstMedia('identity_card');

        if (is_null($media)) {
            return 'https://via.placeholder.com/856x540/fff/1f90ff?text=No%20Identity%20Card';
        }

        if (! $media->hasGeneratedConversion('identity_card')) {
            return 'https://via.placeholder.com/856x540/fff/1f90ff?text=Processing%20Identity%20Card';
        }

        return $media->getUrl('identity_card');
    }

    public function getPaymentLinkAttribute(): string
    {
        $media = $this->getFirstMedia('payment_confirm');

        if (is_null($media)) {
            return 'https://via.placeholder.com/214x200/fff/1f90ff?text=No%20Payment%20File%20Upload';
        }

        return $media->getUrl('payment_confirm');
    }

    public function getMemberTypeAttribute(): ?string
    {
        /** @var \Carbon\Carbon|null $dateOfBirth */
        $dateOfBirth = $this->getAttribute('date_of_birth');

        if (($dateOfBirth?->age ?? 16) < 30) {
            return "Anggota Biasa Maritim Muda";
        }

        return "Sahabat Maritim Muda";
    }

    public function getMemberCardPreview(): string
    {
        return $this->membership?->getMemberCardPreview()
            ?: 'https://res.cloudinary.com/zhanang19/image/upload/v1635006351/id_card_maritim_fix_2-1_nh9ay1.png';
    }

    public function generateQrCode(): HtmlString
    {
        return new HtmlString(str_replace(
            '<svg',
            '<svg class="absolute top-0 mt-[216px] ml-[542px] w-[65px] h-[65px]"',
            QrCode::format('svg')
                ->errorCorrection('L')
                ->generate(route('check-membership-status', [
                    'id' => $this->uid
                ]))
        ));
    }

    public function getRouteKeyName(): string
    {
        return $this->getKeyName();
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
