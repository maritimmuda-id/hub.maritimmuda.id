<?php

namespace App\Http\Controllers\Profile;

use App\Models\Publication;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewPublicationController
{
    public function __invoke(): View
    {
        return view('profile.publication.list');
    }

    public function apiPub(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $publication = Publication::where('user_id', auth()->id())->get();

        return response()->json($publication, 200);
    }
}
