<?php

namespace App\Models;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class EducationHistory extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'institution_name',
        'major',
        'graduation_date',
        'order_column',
    ];

    protected $casts = [
        'graduation_date' => 'date',
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

    public function getGraduationDateFormattedAttribute(): ?string
    {
        return $this->graduation_date?->format('F Y');
    }
}
