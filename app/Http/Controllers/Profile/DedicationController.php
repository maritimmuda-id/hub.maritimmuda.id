<?php

namespace App\Http\Controllers\Profile;

use App\Models\Dedication;
use App\Http\Requests\DedicationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DedicationController
{
    // Menyimpan riwayat dedikasi baru
    public function apiStore(DedicationRequest $request): JsonResponse
    {
        $dedication = Dedication::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'role' => $request->role,
            'institution_name' => $request->institution_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json([
            'success' => true,
            'data' => $dedication,
        ], 201);
    }

    // Mengedit riwayat dedikasi
    public function apiEdit(DedicationRequest $request, $id): JsonResponse
    {
        $dedication = Dedication::findOrFail($id);
        
        $dedication->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $dedication,
        ], 200);
    }

    // Menghapus riwayat dedikasi
    public function apiDelete($id): JsonResponse
    {
        $dedication = Dedication::findOrFail($id);
        $dedication->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dedication record deleted successfully',
        ], 200);
    }
}
