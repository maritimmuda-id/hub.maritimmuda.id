<?php

namespace App\Http\Controllers\Profile;

use App\Models\WorkExperience;
use App\Http\Requests\WorkExperienceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WorkExperienceController
{
    // Menyimpan riwayat pekerjaan baru
    public function apiStore(WorkExperienceRequest $request): JsonResponse
    {
       $workexperience = WorkExperience::create([
           'user_id' => auth()->id(),
           'position_title' => $request->position_title,
           'company_name' => $request->company_name,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date,
       ]);

        return response()->json([
            'success' => true,
            'data' => $workexperience,
        ], 201);
    }

    // Mengedit riwayat pekerjaan
    public function apiEdit(WorkExperienceRequest $request, $id): JsonResponse
    {
        $workexperience = WorkExperience::findOrFail($id);
        
        $workexperience->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $workexperience,
        ], 200);
    }

    // Menghapus riwayat pekerjaan
    public function apiDelete($id): JsonResponse
    {
        $workexperience = WorkExperience::findOrFail($id);
        $workexperience->delete();

        return response()->json([
            'success' => true,
            'message' => 'Work Experience record deleted successfully',
        ], 200);
    }
}
