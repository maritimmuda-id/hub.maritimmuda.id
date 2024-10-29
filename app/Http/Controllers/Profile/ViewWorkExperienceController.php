<?php

namespace App\Http\Controllers\Profile;

use App\Models\WorkExperience;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewWorkExperienceController
{
    public function __invoke(): View
    {
        return view('profile.work-experience.list');
    }

    public function apiWork(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $experience = WorkExperience::where('user_id', auth()->id())->get();

        return response()->json($experience, 200);
    }
}
