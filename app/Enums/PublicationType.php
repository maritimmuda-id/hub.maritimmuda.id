<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class PublicationType extends Enum implements LocalizedEnum
{
    const Book = 1;

    const JournalArticle = 2;

    const MagazineArticle = 3;

    const Abstracts = 4;

    const ProceedingArticle = 5;
}
