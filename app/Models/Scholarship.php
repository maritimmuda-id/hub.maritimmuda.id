<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Scholarship extends Model implements HasMedia
{
    use HasFactory;
    use HasUuid;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'provider_name',
        'registration_link',
        'submission_deadline',
    ];

    protected $casts = [
        'submission_deadline' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster')
            ->singleFile()
            ->useFallbackUrl("https://via.placeholder.com/1200x628/FFF/1F90FF");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('poster')
            ->fit(Manipulations::FIT_CROP, 500, 500);
    }

    public function getPosterLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('poster');
    }

    public function getPosterThumbLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('poster', 'thumb');
    }

    public static function attributes(): array
    {
        return [
            'name' => trans('scholarships.name-label'),
            'provider_name' => trans('scholarships.provider-name-label'),
            'registration_link' => trans('scholarships.registration-link-label'),
            'submission_deadline' => trans('scholarships.submission-deadline-label'),
            'poster' => trans('scholarships.poster-label'),
        ];
    }
}
