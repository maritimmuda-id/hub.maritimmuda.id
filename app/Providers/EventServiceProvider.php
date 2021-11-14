<?php

namespace App\Providers;

use App\Listeners\RegenerateMemberCardAfterUploadingPhoto;
use App\Models\Event;
use App\Models\JobPost;
use App\Models\Scholarship;
use App\Models\User;
use App\Observers\EventObserver;
use App\Observers\JobPostObserver;
use App\Observers\ScholarshipObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers;
use Spatie\MediaLibrary\MediaCollections\Events\MediaHasBeenAdded;

class EventServiceProvider extends Providers\EventServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MediaHasBeenAdded::class => [
            RegenerateMemberCardAfterUploadingPhoto::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(EventObserver::class);
        Scholarship::observe(ScholarshipObserver::class);
        JobPost::observe(JobPostObserver::class);
        User::observe(UserObserver::class);
    }
}
