<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Gender;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController
{
    public function create(): View
    {
        $provinces = Province::query()->pluck('name', 'id')->toArray();

        return view('auth.register', compact('provinces'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', new EnumValue(Gender::class, false)],
            'province_id' => ['required', new Rules\Exists(Province::class, 'id')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'province_id' => $request->province_id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    
    public function apiStore(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required', new EnumValue(Gender::class, false)],
            'province_id' => ['required', new Rules\Exists(Province::class, 'id')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'province_id' => $request->province_id,
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ], 201);
    }
}
