<?php

namespace App\Models;

use App\Enums\EventType;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use HasUuid;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'organizer_name',
        'type',
        'external_url',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'type' => EventType::class,
        'start_date' => 'datetime',
        'end_date' => 'datetime',
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
            'name' => trans('events.name-label'),
            'organizer_name' => trans('events.organizer-name-label'),
            'type' => trans('events.type-label'),
            'external_url' => trans('events.external-url-label'),
            'start_date' => trans('events.start-date-label'),
            'end_date' => trans('events.end-date-label'),
            'poster' => trans('events.poster-label'),
        ];
    }
}
