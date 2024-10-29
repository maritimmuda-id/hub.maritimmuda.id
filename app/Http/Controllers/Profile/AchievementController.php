<?php

namespace App\Http\Controllers\Profile;

use App\Models\AchievementHistory;
use App\Http\Requests\AchievementRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AchievementController
{
    // Menyimpan riwayat penghargaan baru
    public function apiStore(AchievementRequest $request): JsonResponse
    {
        $achievement = AchievementHistory::create([
            'user_id' => auth()->id(),
            'award_name' => $request->award_name,
            'appreciator' => $request->appreciator,
            'event_name' => $request->event_name,
            'event_level' => $request->event_level,
            'achieved_at' => $request->achieved_at,
        ]);

        return response()->json([
            'success' => true,
            'data' => $achievement,
        ], 201);
    }

    // Mengedit riwayat penghargaan
    public function apiEdit(AchievementRequest $request, $id): JsonResponse
    {
        $achievement = AchievementHistory::findOrFail($id);
        
        $achievement->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $achievement,
        ], 200);
    }

    // Menghapus riwayat penghargaan
    public function apiDelete($id): JsonResponse
    {
        $achievement = AchievementHistory::findOrFail($id);
        $achievement->delete();

        return response()->json([
            'success' => true,
            'message' => 'Achievement record deleted successfully',
        ], 200);
    }
}
