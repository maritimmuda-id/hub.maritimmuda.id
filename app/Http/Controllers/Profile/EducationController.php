<?php

namespace App\Http\Controllers\Profile;

use App\Models\EducationHistory;
use App\Http\Requests\EducationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EducationController 
{
    // Menyimpan riwayat pendidikan baru
    public function apiStore(EducationRequest $request): JsonResponse
    {
        $education = EducationHistory::create([
            'user_id' => auth()->id(),
            'institution_name' => $request->institution_name,
            'graduation_date' => $request->graduation_date,
            'major' => $request->major,
            'level' => $request->level,
        ]);

        return response()->json([
            'success' => true,
            'data' => $education,
        ], 201);
    }

    // Mengedit riwayat pendidikan
    public function apiEdit(EducationRequest $request, $id): JsonResponse
    {
        $education = EducationHistory::findOrFail($id);
        
        $education->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $education,
        ], 200);
    }

    // Menghapus riwayat pendidikan
    public function apiDelete($id): JsonResponse
    {
        $education = EducationHistory::findOrFail($id);
        $education->delete();

        return response()->json([
            'success' => true,
            'message' => 'Education record deleted successfully',
        ], 200);
    }
}
