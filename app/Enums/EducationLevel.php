<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EducationLevel extends Enum implements LocalizedEnum
{
    const SeniorHighSchool = 1;

    const VocationalHighSchool = 2;

    const IslamicBoardingSchool = 3;

    const D3 = 4;

    const D4 = 5;

    const BachelorDegree = 6;

    const MasterDegree = 7;

    const DoctorDegree = 8;
}
