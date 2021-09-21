<?php

namespace App\Models;

use App\Enums\PublicationType;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Publication extends Model implements HasMedia, Sortable
{
    use HasFactory;
    use HasUuid;
    use InteractsWithMedia;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'title',
        'author_name',
        'type',
        'publisher',
        'city',
        'publish_date',
        'order_column',
    ];

    protected $casts = [
        'type' => PublicationType::class,
        'publish_date' => 'date',
        'order_column' => 'integer',
    ];

    public function buildSortQuery(): Eloquent\Builder | Query\Builder
    {
        return static::query()
            ->where('user_id', $this->getAttribute('user_id'));
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('first_page')
            ->singleFile()
            ->useFallbackUrl("https://via.placeholder.com/210x297/fff/1f90ff?text=No%20First%20Page");
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->performOnCollections('first_page')
            ->setManipulations(
                Manipulations::create()
                    ->width(210)
                    ->height(297)
            )
            ->queued();
    }

    public function user(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(User::class);
    }

    public function getPublishDateFormattedAttribute(): string
    {
        return $this->publish_date->format('F Y');
    }

    public function getFirstPageLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('first_page', 'thumb');
    }

    public static function attributes(): array
    {
        return [
            'title' => trans('profile.publication.title-label'),
            'author_name' => trans('profile.publication.author-name-label'),
            'type' => trans('profile.publication.type-label'),
            'publisher' => trans('profile.publication.publisher-label'),
            'city' => trans('profile.publication.city-label'),
            'first_page' => trans('profile.publication.first-page-label'),
            'publish_date' => trans('profile.publication.publish-date-label'),
        ];
    }
}
