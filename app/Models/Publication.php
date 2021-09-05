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

class Publication extends Model implements Sortable
{
    use HasFactory;
    use HasUuid;
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
            ->where('user_id', $this->user_id);
    }

    public function user(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(User::class);
    }

    public function getPublishDateFormattedAttribute(): string
    {
        return $this->publish_date->format('F Y');
    }
}
