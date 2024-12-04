<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class VerifyMembershipController
{
    public function __invoke(?string $id)
    {
        $user = User::query()
            ->has('membership', '=', 1)
            ->where('uid', $id)
            ->firstOrFail();

        return view('member.detail', compact('user'));
    }

    public function apiVerifyMembership(?string $id): JsonResponse
    {
        $user = User::query()
            ->where('id', $id)
            ->whereHas('membership', function ($query) {
                $query->whereNotNull('verified_at') // Keanggotaan harus diverifikasi
                      ->where('expired_at', '>', now()); // Keanggotaan belum kedaluwarsa
            })
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found or membership inactive.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'user' => $user,
            'membership_status' => 'active',
            'membership_verified_at' => $user->membership->verified_at,
            'membership_expired_at' => $user->membership->expired_at,
        ]);
    }

    public function apiVerifyUid(?string $email): JsonResponse
    {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found or membership inactive.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'user' => $user,
            'uid' => 'active',
            // 'membership_verified_at' => $user->membership->verified_at,
            // 'membership_expired_at' => $user->membership->expired_at,
        ]);
    }
}
