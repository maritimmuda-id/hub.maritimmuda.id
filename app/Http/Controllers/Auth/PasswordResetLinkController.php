<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function apiForgotPassword(Request $request): JsonResponse
    {
        // Validasi request
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Mengirim link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Cek status pengiriman link dan memberikan respons sesuai
        if ($status == Password::RESET_LINK_SENT) {
            return response()->json([
                'message' => __($status)
            ], 200);
        }

        return response()->json([
            'errors' => [
                'email' => __($status)
            ]
        ], 422);
    }
}
