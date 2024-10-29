<?php

namespace App\Http\Controllers\Profile;

use App\Models\Research;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewResearchController
{
    public function __invoke(): View
    {
        return view('profile.research.list');
    }

    public function apiRsc(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $researchs = Research::where('user_id', auth()->id())->get();

        return response()->json($researchs, 200);
    }
}
