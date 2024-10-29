<?php

namespace App\Http\Controllers\Profile;

use App\Models\EducationHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewEducationHistoryController
{
    public function __invoke(): View
    {
        return view('profile.education-history.list');
    }

    public function apiEdu(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $educations = EducationHistory::where('user_id', auth()->id())->get();

        return response()->json($educations, 200);
    }
}
