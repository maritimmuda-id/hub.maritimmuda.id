<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTokenAndVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah diautentikasi dan tokennya valid
        if (!$request->bearerToken() || !Auth::guard('sanctum')->check()) {
            return response()->json(['message' => 'Unauthorized - Token is missing or invalid'], 401);
        }

        // Pastikan email sudah terverifikasi
        $user = $request->user();
        if (!$user || !$user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Bad Request - Email is not verified'], 400);
        }

        return $next($request);
    }
}
