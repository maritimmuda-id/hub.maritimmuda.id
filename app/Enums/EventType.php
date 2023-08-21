<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EventType extends Enum implements LocalizedEnum
{
    const Seminar = 1;

    const ScientificConference = 2;

    const Forum = 3;

    const Competition = 4;

    const CommunityDevelopment = 5;

    const Research = 6;

    const Training = 7;

    const EnvironmentalAction = 8;

    const YouthExchange = 9;
}
