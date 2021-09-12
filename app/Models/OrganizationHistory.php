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

class OrganizationHistory extends Model implements Sortable
{
    use HasFactory;
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'organization_name',
        'role',
        'period_start_date',
        'period_end_date',
        'order_column',
    ];

    protected $casts = [
        'period_start_date' => 'date',
        'period_end_date' => 'date',
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

    public function getPeriodStartDateFormattedAttribute(): string
    {
        return $this->period_start_date->format('F Y');
    }

    public function getPeriodEndDateFormattedAttribute(): string
    {
        if (is_null($this->period_end_date)) {
            return __('Now');
        }

        return $this->period_end_date->format('F Y');
    }

    public static function attributes(): array
    {
        return [
            'organization_name' => trans('profile.organization-history.organization-name-label'),
            'role' => trans('profile.organization-history.role-label'),
            'period_start_date' => trans('profile.organization-history.period-start-date-label'),
            'period_end_date' => trans('profile.organization-history.period-end-date-label'),
        ];
    }
}
