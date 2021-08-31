<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EventType extends Enum implements LocalizedEnum
{
    const Webinar = 1;

    const ScientificConference = 2;

    const Forum = 3;

    const Competition = 4;

    const Dedication = 5;

    const Research = 6;

    const Training = 7;
}
