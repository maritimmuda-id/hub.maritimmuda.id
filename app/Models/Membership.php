<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Membership extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'verified_at',
        'expired_at',
    ];

    protected $casts = [
        'verified_at' => 'date',
        'expired_at' => 'date',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('member-card-preview')
            ->singleFile();

        $this->addMediaCollection('member-card-document')
            ->singleFile();
    }

    public function hasMemberCard(): bool
    {
        return $this->hasMedia('member-card-document');
    }

    public function getMemberCardPreview(): string
    {
        return $this->getFirstMediaUrl('member-card-preview');
    }

    public function getMemberCardDocumentLinkAttribute(): string
    {
        return $this->getFirstMediaUrl('member-card-document');
    }
}
