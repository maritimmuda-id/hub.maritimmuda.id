<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewEventPublished extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Event $event,
    ) {
        $this->afterCommit = true;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title' => trans('notification.new-event-published-message'),
            'message' => $this->event->name,
            'action' => route('event.show', $this->event),
            'target' => '_blank',
        ];
    }
}
