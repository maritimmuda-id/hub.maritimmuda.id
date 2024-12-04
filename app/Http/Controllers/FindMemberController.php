<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;

class FindMemberController
{
    public function __invoke(): View
    {
        return view('member.index');
    }

    public function apiMember(Request $request): JsonResponse
    {
        // Mengambil semua anggota. Anda bisa menambahkan logika untuk filter atau pagination jika perlu.
        $members = User::all()->map(function ($member) {
	    return [
	         'id' => $member->id,
		 'uuid' => $member->uuid,
		 'uid' => $member->uid,
		 'serial_number' => $member->serial_number,
		 'name' => $member->name,
		 'locale' => $member->locale,
		 'province_id' => $member->province_id,
		 'email' => $member->email,
		 'first_expertise_id' => $member->first_expertise_id,
		 'second_expertise_id' => $member->second_expertise_id,
		 //'email_verified_at' => $member->email_verified_at,
		 //'created_at' => $member->created_at,
		 'bio' => $member->bio,
		 'photo_link' => $member->photo_link,
	    ];
	});

        return response()->json([
            'success' => true,
            'members' => $members,
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
		 'message' => 'User not found or membership inactive',
	    ], 404);
	}

	return response()->json([
	     'success' => true,
	     'user' => $user,
	     'uid' => 'active',
	]);
    }
}
