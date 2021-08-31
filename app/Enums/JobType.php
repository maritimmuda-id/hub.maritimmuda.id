<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class JobType extends Enum implements LocalizedEnum
{
    const FullTime = 1;

    const PartTime = 2;

    const Internship = 3;

    const Contract = 4;

    const Freelance = 5;
}
