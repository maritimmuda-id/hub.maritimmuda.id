<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * Base on ISO/IEC 5218 standards
 *
 * @see https://wikipedia.org/wiki/ISO/IEC_5218
 */
final class Gender extends Enum implements LocalizedEnum
{
    public const NotKnown = 0;

    public const Male = 1;

    public const Female = 2;

    public const NotApplicable = 9;

    public static function asSimpleSelectArray(): array
    {
        return [
            static::Male => static::getDescription(static::Male),
            static::Female => static::getDescription(static::Female),
        ];
    }
}
