<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class WorkExperience extends Model implements Sortable
{
    use HasFactory;
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'position_title',
        'company_name',
        'start_date',
        'end_date',
        'order_column',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
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

    public function getStartDateFormattedAttribute(): string
    {
        return $this->start_date->format('F Y');
    }

    public function getEndDateFormattedAttribute(): string
    {
        if (is_null($this->end_date)) {
            return __('Now');
        }

        return $this->end_date->format('F Y');
    }

    public function getWorkDurationAttribute(): string
    {
        return $this->start_date->longAbsoluteDiffForHumans(
            $this->end_date ?? now(),
            2
        );
    }
}
