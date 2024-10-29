<?php

namespace App\Http\Controllers\Profile;

use App\Models\AchievementHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewAchievementHistoryController
{
    public function __invoke(): View
    {
        return view('profile.achievement-history.list');
    }

    public function apiAcv(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $achievements = AchievementHistory::where('user_id', auth()->id())->get();

        return response()->json($achievements, 200);
    }
}
