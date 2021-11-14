<?php

namespace App\Listeners;

use App\Jobs\GenerateMemberCardJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class RegenerateMemberCardAfterUploadingPhoto implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(MediaHasBeenAdded $event): void
    {
        $media = $event->media;

        /** @var \App\Models\User $user */
        $user = $media->model;

        if (
            $media->model_type === User::class &&
            $media->collection_name === 'photo' &&
            $user->membership()->count() === 1
        ) {
            GenerateMemberCardJob::dispatch($user)->delay(10);
        }
    }
}
