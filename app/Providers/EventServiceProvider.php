<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\JobPost;
use App\Models\Scholarship;
use App\Observers\EventObserver;
use App\Observers\JobPostObserver;
use App\Observers\ScholarshipObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers;

class EventServiceProvider extends Providers\EventServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
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
    }
}
