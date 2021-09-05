<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class AchievementHistory extends Model implements Sortable
{
    use HasFactory;
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'award_name',
        'event_name',
        'event_level',
        'achieved_at',
        'order_column',
    ];

    protected $casts = [
        'achieved_at' => 'date',
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

    public function getAchievedAtFormattedAttribute(): string
    {
        if (is_null($this->achieved_at)) {
            return '';
        }

        return $this->achieved_at->format('F Y');
    }
}
