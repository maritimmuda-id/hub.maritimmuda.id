<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::saving(function (Model $model) {
            if (empty($model->{static::getUuidColumnName()})) {
                $model->{static::getUuidColumnName()} = (string) Str::uuid();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        if (config('app.env') === 'production') {
            return 'uuid';
        }

        return $this->getKeyName();
    }

    public static function getUuidColumnName(): string
    {
        return 'uuid';
    }
}

