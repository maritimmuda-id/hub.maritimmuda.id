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

        // $months = [];
        // $currentMonth = Carbon::now();

        // for ($i = 0; $i < 12; $i++) {
        //     $months[] = $currentMonth->format('F Y'); // Get the current month in 'F Y' format
        //     $currentMonth->subMonth(); // Move to the previous month
        // }

        // $userCounts = [];

        // foreach ($months as $month) {
        //     // Parse the month and year from the array value
        //     $parsedDate = Carbon::createFromFormat('F Y', $month);

        //     // Get the start and end of the month
        //     $startDate = $parsedDate->startOfMonth();
        //     $endDate = $parsedDate->endOfMonth();

        //     // Query the database to count users within the specified month
        //     $userCount = User::whereBetween('created_at', [$startDate, $endDate])->count();

        //     // Store the user count in the results array
        //     $userCounts[$month] = $userCount;
        // }

        $startDate = now()->subMonths(11)->startOfMonth();
        $endDate = now()->endOfMonth();

        $userCounts = User::whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'ASC')
            ->orderBy(DB::raw('MONTH(created_at)'), 'ASC')
            ->get([DB::raw('COUNT(*) as count')]);

        // Inisialisasi array hasil dengan nilai 0 untuk 12 bulan
        $monthlyCounts = array_fill(0, 12, 0);

        foreach ($userCounts as $count) {
            // Mendapatkan indeks bulan dalam array
            $monthIndex = (now()->year - $count->year) * 12 + (now()->month - $count->month);

            // Memasukkan jumlah pengguna ke dalam array sesuai dengan indeks bulan
            $monthlyCounts[$monthIndex] = $count->count;
        }


        return view('dashboard', compact('user', 'widgets','monthlyCounts'));
    }
}
