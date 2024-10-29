<?php

namespace App\Http\Controllers\Profile;

use App\Models\OrganizationHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewOrganizationHistoryController
{
    public function __invoke(): View
    {
        return view('profile.organization-history.list');
    }

    public function apiOrg(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $organizations = OrganizationHistory::where('user_id', auth()->id())->get();

        return response()->json($organizations, 200);
    }
}
