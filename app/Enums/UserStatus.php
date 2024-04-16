<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const NoVerify = 2;

    const RequestIdentityCardVerification = 3;

    const RequestRenewalMembership = 4;

    const HaveAnIdentityCard = 5;

    const UserAdmin = 6;

    const UserDeveloper = 7;

    const Superadmin = 8;
}
