<?php

namespace App\Models;

use App\Enums\EducationLevel;
use App\Models\Concerns\HasUuid;
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
    use HasUuid;
    use SortableTrait;

    protected $fillable = [
        'user_id',
        'institution_name',
        'major',
        'level',
        'graduation_date',
        'order_column',
    ];

    protected $casts = [
        'level' => EducationLevel::class,
        'graduation_date' => 'date',
        'order_column' => 'integer',
    ];

    public function buildSortQuery(): Eloquent\Builder | Query\Builder
    {
        return static::query()
            ->where('user_id', $this->getAttribute('user_id'));
    }

    public function user(): BelongsTo | Eloquent\Builder | Query\Builder
    {
        return $this->belongsTo(User::class);
    }

    public function getGraduationDateFormattedAttribute(): ?string
    {
        return $this->graduation_date?->format('F Y');
    }

    public static function attributes(): array
    {
        return [
            'institution_name' => trans('profile.education-history.institution-name-label'),
            'major' => trans('profile.education-history.major-label'),
            'level' => trans('profile.education-history.level-label'),
            'graduation_date' => trans('profile.education-history.graduation-date-label'),
        ];
    }
}
