<?php

namespace App\Http\Controllers\Profile;

use App\Models\OrganizationHistory;
use App\Http\Requests\OrganizationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrganizationController
{
    // Menyimpan riwayat organisasi baru
    public function apiStore(OrganizationRequest $request): JsonResponse
    {
        $organization = OrganizationHistory::create([
            'user_id' => auth()->id(),
            'organization_name' => $request->organization_name,
            'role' => $request->role,
            'period_start_date' => $request->period_start_date,
            'period_end_date' => $request->period_end_date,
        ]);

        return response()->json([
            'success' => true,
            'data' => $organization,
        ], 201);
    }

    // Mengedit riwayat organisasi
    public function apiEdit(OrganizationRequest $request, $id): JsonResponse
    {
        $organization = OrganizationHistory::findOrFail($id);
        
        $organization->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $organization,
        ], 200);
    }

    // Menghapus riwayat organisasi
    public function apiDelete($id): JsonResponse
    {
        $organization = OrganizationHistory::findOrFail($id);
        $organization->delete();

        return response()->json([
            'success' => true,
            'message' => 'Organization record deleted successfully',
        ], 200);
    }
}
