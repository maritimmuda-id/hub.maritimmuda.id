<?php

namespace App\Observers;

use App\Jobs\GenerateMemberCardJob;
use App\Models\User;
use Illuminate\Support\Arr;

class UserObserver
{
    public $afterCommit = true;

    public function updated(User $user): void
    {
        $this->regenerateMemberCard($user);
    }

    private function regenerateMemberCard(User $user): void
    {
        if ($user->membership()->count() < 1) {
            return;
        }

        /** @var \Illuminate\Database\Query\Builder $query */
        $query = $user->activities();

        /** @var \Spatie\Activitylog\Models\Activity $activity */
        $activity = $query->where('event', 'updated')->latest()->first();

        $needRegenerateMemberCard = Arr::hasAny(
            $activity->changes()->collapse()->all(),
            [
                'name',
                'date_of_birth',
                'province_id',
                'first_expertise_id',
                'second_expertise_id',
            ]
        );

        if ($needRegenerateMemberCard) {
            GenerateMemberCardJob::dispatch($user)->delay(5);
        }
    }
}
