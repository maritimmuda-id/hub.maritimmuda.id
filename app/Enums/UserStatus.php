<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const NoVerify = 2;

    const RequestIdentityCardVerification = 3;

    const RequestRenewalMembership = 4;

<<<<<<< HEAD
<<<<<<< Updated upstream
=======
    const UserDeveloper = 5;

    const Superadmin = 6;

>>>>>>> 0a477e3c772f9f1360ba4db642e866c65598accd
    // const RequestRenewalMembership = 3;
=======
    const HaveAnIdentityCard = 5;

    const UserAdmin = 6;

    const UserDeveloper = 7;

    const Superadmin = 8;
>>>>>>> Stashed changes
}
