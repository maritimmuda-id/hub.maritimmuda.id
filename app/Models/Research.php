<?php

namespace App\Models;

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
    use SortableTrait;

    protected $fillable = [
        'name',
        'role',
        'institution_name',
        'year',
        'order_column',
    ];

    protected $casts = [
        'year' => 'datetime',
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

    public function getYearFormattedAttribute(): string
    {
        return $this->year?->format('F Y');
    }
}
