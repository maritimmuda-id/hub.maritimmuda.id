<?php

namespace App\Observers;

use App\Jobs\SendBatchNotificationJob;
use App\Models\Event;
use App\Notifications\NewEventPublished;

class EventObserver
{
    public function created(Event $event): void
    {
        SendBatchNotificationJob::dispatch(
            NewEventPublished::class, $event
        );
    }
}
