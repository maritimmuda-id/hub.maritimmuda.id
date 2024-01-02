<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const RequestIdentityCardVerification = 2;

    const UserAdmin = 3;

    // const RequestRenewalMembership = 3;
}
