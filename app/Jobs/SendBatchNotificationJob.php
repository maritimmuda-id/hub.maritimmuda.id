<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendBatchNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $notificationClass,
        public $args,
        public int $chunk = 100
    ) {}

    public function handle(): void
    {
        User::query()->chunk($this->chunk, function (Collection $users) {
            $users->each(fn (User $user) => $user->notify(
                new $this->notificationClass($this->args)
            ));
        });
    }
}
