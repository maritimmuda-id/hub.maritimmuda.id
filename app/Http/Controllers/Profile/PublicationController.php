<?php

namespace App\Http\Controllers\Profile;

use App\Models\Publication;
use App\Http\Requests\PublicationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PublicationController
{
    // Menyimpan riwayat publikasi baru
    public function apiStore(PublicationRequest $request): JsonResponse
    {
        $publication = Publication::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'author_name' => $request->author_name,
            'type' => $request->type,
            'publisher' => $request->publisher,
            'city' => $request->city,
            'publish_date' => $request->publish_date,
            'first_page' => $request->first_page,
        ]);

        return response()->json([
            'success' => true,
            'data' => $publication,
        ], 201);
    }

    // Mengedit riwayat publikasi
    public function apiEdit(PublicationRequest $request, $id): JsonResponse
    {
        $publication = Publication::findOrFail($id);
        
        $publication->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $publication,
        ], 200);
    }

    // Menghapus riwayat publikasi
    public function apiDelete($id): JsonResponse
    {
        $publication = Publication::findOrFail($id);
        $publication->delete();

        return response()->json([
            'success' => true,
            'message' => 'Publication record deleted successfully',
        ], 200);
    }
}
