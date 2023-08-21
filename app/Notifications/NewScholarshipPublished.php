<?php

namespace App\Notifications;

use App\Models\Scholarship;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewScholarshipPublished extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Scholarship $scholarship,
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
            'title' => trans('notification.new-scholarship-published-message'),
            'message' => $this->scholarship->name,
            'action' => route('scholarship.show', $this->scholarship),
            'target' => '_blank',
        ];
    }
}
