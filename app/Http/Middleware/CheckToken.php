<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckToken
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

         // Check if the request has a valid Sanctum token
        if (!$request->bearerToken() || !Auth::guard('sanctum')->check()) {
            return response()->json(['message' => 'Unauthorized - Token is missing or invalid'], 401);
        }

        return $next($request);
    }
}
