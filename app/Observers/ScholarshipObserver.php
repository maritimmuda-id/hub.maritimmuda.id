<?php

namespace App\Observers;

use App\Jobs\SendBatchNotificationJob;
use App\Models\Scholarship;
use App\Notifications\NewScholarshipPublished;

class ScholarshipObserver
{
    public function created(Scholarship $scholarship): void
    {
        SendBatchNotificationJob::dispatch(
            NewScholarshipPublished::class, $scholarship
        );
    }
}
