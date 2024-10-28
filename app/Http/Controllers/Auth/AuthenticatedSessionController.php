<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function apiStore(LoginRequest $request): JsonResponse
    {
        // Attempt to authenticate the user
        $request->authenticate();

        // Regenerate the session to avoid session fixation
        // $request->session()->regenerate();

        // Respond with a JSON message and user data
        return response()->json([
            'message' => 'Login successful',
            'user' => Auth::user(),
            'token' => $request->user()->createToken('API Token')->plainTextToken,
        ], 200);
    }

    public function destroy(Request $request): RedirectResponse
    {
        /** @var \Illuminate\Contracts\Auth\StatefulGuard $webGuard */
        $webGuard = Auth::guard('web');
        $webGuard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
