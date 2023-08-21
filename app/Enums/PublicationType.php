<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class PublicationType extends Enum implements LocalizedEnum
{
    const Abstracts = 1;

    const Book = 2;

    const JournalArticle = 3;

    const MagazineArticle = 4;

    const NewsArticle = 5;

    const ProceedingArticle = 6;
}
