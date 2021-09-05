<?php

namespace App\Models;

use App\Enums\JobType;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class JobPost extends Model implements HasMedia
{
    use HasFactory;
    use HasUuid;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'position_title',
        'company_name',
        'type',
        'link',
        'application_closed_at',
    ];

    protected $casts = [
        'id' => 'integer',
        'type' => JobType::class,
        'application_closed_at' => 'datetime',
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
            'position_title' => trans('job-posts.position-title-label'),
            'company_name' => trans('job-posts.company-name-label'),
            'type' => trans('job-posts.type-label'),
            'link' => trans('job-posts.link-label'),
            'application_closed_at' => trans('job-posts.application-closed-at-label'),
            'poster' => trans('job-posts.poster-label'),
        ];
    }
}
