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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ViewDashboardController
{
    public function __invoke(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $ttl = (int)CarbonInterval::minutes(30)->totalSeconds;

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
                'label' => trans('dashboard.users-label'),
                'value' => $membersCount,
                'icon' => 'fas fa-user-friends',
                'action' => Gate::check('viewAny', \App\Models\User::class) ? route('user.index') : route('find-member'),
            ],
            [
                'label' => trans('dashboard.events-label'),
                'value' => $eventsCount,
                'icon' => 'fas fa-calendar-alt',
                'action' => route('event.index'),
            ],
            [
                'label' => trans('dashboard.scholarships-label'),
                'value' => $scholarshipsCount,
                'icon' => 'fas fa-money-bill-alt',
                'action' => route('scholarship.index'),
            ],
            [
                'label' => trans('dashboard.job-posts-label'),
                'value' => $jobPostsCount,
                'icon' => 'fas fa-briefcase',
                'action' => route('job-post.index'),
            ],

        ];

        $months = [];
        $currentMonth = Carbon::now();

        for ($i = 0; $i < 12; $i++) {
            $months[] = $currentMonth->format('F Y'); // Get the current month in 'F Y' format
            $currentMonth->subMonth(); // Move to the previous month
        }

        $userCounts = [];

        foreach ($months as $month) {
            // Parse the month and year from the array value
            $parsedDate = Carbon::createFromFormat('F Y', $month);

            // Get the start and end of the month
            $startDate = $parsedDate->startOfMonth();
            $endDate = $parsedDate->endOfMonth();

            // Query the database to count users within the specified month
            $userCount = User::whereBetween('created_at', [$startDate, $endDate])->count();

            // Store the user count in the results array
            $userCounts[$month] = $userCount;
        }

        // // Mendapatkan tanggal hari ini
        // $today = Carbon::now();

        // // Inisialisasi array untuk menyimpan daftar bulan
        // $months = [];

        // // Loop untuk menghitung 12 bulan terakhir
        // for ($i = 0; $i < 12; $i++) {
        //     // Memformat tanggal dalam format "F Y" dan menyimpannya dalam array
        //     $formattedDate = $today->format('F Y');
        //     $months[] = $formattedDate;

        //     // Pindahkan ke bulan sebelumnya
        //     $today->subMonth();
        // }

        // // Membalikkan array untuk mendapatkan urutan bulan yang benar
        // $months = array_reverse($months);

        // $currentDate = Carbon::now();
        // $monthlyCounts = [];

        // for ($i = 0; $i < 12; $i++) {
        //     $startDate = $currentDate->copy()->subMonths($i)->startOfMonth();
        //     $endDate = $currentDate->copy()->subMonths($i)->endOfMonth();

        //     // $monthName = $startDate->format('F Y');
        //     $count = User::whereBetween('created_at', [$startDate, $endDate])->count();

        //     $monthlyCounts[] = $count;
        // }
        // $monthlyCounts  = array_reverse($monthlyCounts);

        return view('dashboard', compact('user', 'widgets','months', 'membersCount'));
    }
}
