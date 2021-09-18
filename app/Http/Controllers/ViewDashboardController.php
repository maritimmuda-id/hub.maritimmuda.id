<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\JobPost;
use App\Models\Scholarship;
use App\Models\User;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class ViewDashboardController
{
    public function __invoke(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $ttl = CarbonInterval::minutes(30)->totalSeconds;

        $membersCount = Cache::remember('DashboardUserCount', $ttl, function () {
            return User::query()->count();
        });
        $eventsCount = Cache::remember('DashboardEventCount', $ttl, function () {
            return Event::query()->count();
        });
        $scholarshipsCount = Cache::remember('DashboardScholarshipCount', $ttl, function () {
            return Scholarship::query()->count();
        });
        $jobPostsCount = Cache::remember('DashboardJobPostCount', $ttl, function () {
            return JobPost::query()->count();
        });

        $widgets = [
            [
                'label' => trans('users.plural-name'),
                'value' => $membersCount,
                'icon' => 'fas fa-user-friends',
                'action' => Gate::check('viewAny', \App\Models\User::class) ? route('user.index') : route('find-member'),
            ],
            [
                'label' => trans('events.plural-name'),
                'value' => $eventsCount,
                'icon' => 'fas fa-calendar-alt',
                'action' => route('event.index'),
            ],
            [
                'label' => trans('scholarships.plural-name'),
                'value' => $scholarshipsCount,
                'icon' => 'fas fa-money-bill-alt',
                'action' => route('scholarship.index'),
            ],
            [
                'label' => trans('job-posts.plural-name'),
                'value' => $jobPostsCount,
                'icon' => 'fas fa-briefcase',
                'action' => route('job-post.index'),
            ],
        ];

        return view('dashboard', compact('user', 'widgets'));
    }
}
