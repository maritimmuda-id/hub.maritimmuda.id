<?php

namespace App\Notifications;

use App\Models\JobPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NewJobPostPublished extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public JobPost $jobPost,
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
            'title' => trans('notification.new-job-post-published-message'),
            'message' => "{$this->jobPost->position_title} - {$this->jobPost->company_name}",
            'action' => route('job-post.show', $this->jobPost),
            'target' => '_blank',
        ];
    }
}
