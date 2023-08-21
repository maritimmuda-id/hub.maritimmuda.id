<?php

namespace App\Observers;

use App\Jobs\SendBatchNotificationJob;
use App\Models\JobPost;
use App\Notifications\NewJobPostPublished;

class JobPostObserver
{
    public function created(JobPost $jobPost): void
    {
        SendBatchNotificationJob::dispatch(
            NewJobPostPublished::class, $jobPost
        );
    }
}
