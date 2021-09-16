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

class Research extends Model implements Sortable
{
    use HasFactory;
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'name',
        'role',
        'institution_name',
        'sponsor_name',
        'start_date',
        'end_date',
        'order_column',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
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

    public function getPeriodDateAttribute(): string
    {
        $startDate = $this->start_date->format('F Y');

        if (is_null($this->end_date)) {
            return $startDate;
        }

        return "{$startDate} - {$this->end_date->format('F Y')}";
    }

    public static function attributes(): array
    {
        return [
            'name' => trans('profile.research.name-label'),
            'role' => trans('profile.research.role-label'),
            'institution_name' => trans('profile.research.institution-name-label'),
            'sponsor_name' => trans('profile.research.sponsor-name-label'),
            'start_date' => trans('profile.research.events.start-date-label-label'),
            'end_date' => trans('profile.research.events.end-date-label-label'),
        ];
    }
}
