<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const RequestIdentityCardVerification = 2;

    const HaveAnIdentityCard = 3;

    const UserAdmin = 4;

    const UserDeveloper = 5;

    const Superadmin = 6;

    // const RequestRenewalMembership = 3;
}
