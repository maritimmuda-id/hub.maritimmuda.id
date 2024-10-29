<?php

namespace App\Http\Controllers\Profile;

use App\Models\Research;
use App\Http\Requests\ResearchRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ResearchController
{
    // Menyimpan riwayat organisasi baru
    public function apiStore(ResearchRequest $request): JsonResponse
    {
        $research = Research::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'role' => $request->role,
            'institution_name' => $request->institution_name,
            'sponsor_name' => $request->sponsor_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json([
            'success' => true,
            'data' => $research,
        ], 201);
    }

    // Mengedit riwayat organisasi
    public function apiEdit(ResearchRequest $request, $id): JsonResponse
    {
        $research = Research::findOrFail($id);
        
        $research->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $research,
        ], 200);
    }

    // Menghapus riwayat organisasi
    public function apiDelete($id): JsonResponse
    {
        $research = Research::findOrFail($id);
        $research->delete();

        return response()->json([
            'success' => true,
            'message' => 'Organization record deleted successfully',
        ], 200);
    }
}
