<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class FindMemberController
{
    public function __invoke(): View
    {
        return view('member.index');
    }

    public function apiMember(): JsonResponse
    {
        // Mengambil semua anggota. Anda bisa menambahkan logika untuk filter atau pagination jika perlu.
        $members = User::all();

        return response()->json([
            'success' => true,
            'members' => $members,
        ]);
    }
}
