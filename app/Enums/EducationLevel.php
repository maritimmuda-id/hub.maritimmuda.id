<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class EducationLevel extends Enum implements LocalizedEnum
{
    const JuniorHighSchool = 1;

    const SeniorHighSchool = 2;

    const VocationalHighSchool = 3;

    const IslamicBoardingSchool = 4;

    const D3 = 5;

    const D4 = 6;

    const BachelorDegree = 7;

    const MasterDegree = 8;

    const DoctorDegree = 9;
}
