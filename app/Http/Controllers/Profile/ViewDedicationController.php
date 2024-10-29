<?php

namespace App\Http\Controllers\Profile;

use App\Models\Dedication;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ViewDedicationController
{
    public function __invoke(): View
    {
        return view('profile.dedication.list');
    }

    public function apiDed(): JsonResponse
    {
        // Ambil semua data pendidikan dari database
        $dedication = Dedication::where('user_id', auth()->id())->get();

        return response()->json($dedication, 200);
    }
}
