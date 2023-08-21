<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateMemberCardJob;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VerifyUserController
{
    public function __invoke(User $user)
    {
        $user->load('membership');

        if (is_null($user->membership)) {
            DB::transaction(
                fn () => $this->prepareMembershipData($user),
                3
            );

            GenerateMemberCardJob::dispatch($user)->afterCommit();

            toast(__('Membership successfully verified'));
        }

        return redirect()->route('user.edit', $user);
    }

    private function prepareMembershipData(User $user): void
    {
        // '00' is reserved for city
        $prefix = $user->province->code . '00' . date('y');

        $attributes = [];

        if (is_null($serialNumber = $user->serial_number)) {
            /** @var \Illuminate\Database\Query\Builder $query */
            $query = User::query();

            /** @var int $lastSerialNumber */
            $lastSerialNumber = $query
                ->where('province_id', $user->province_id)
                ->max('serial_number');

            $serialNumber = ($lastSerialNumber + 1);

            $attributes['serial_number'] = $serialNumber;
        }

        $attributes['uid'] = $prefix . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);

        $user->forceFill($attributes)
            ->saveQuietly(['timestamps' => false]);

        $expiredDate = now()->createFromFormat('Y-m-d', '2021-12-31');

        if (now()->year > 2021) {
            $expiredDate = now()->addYear();
        }

        $user->memberships()
            ->create([
                'verified_at' => now(),
                'expired_at' => $expiredDate,
            ]);
    }
}
