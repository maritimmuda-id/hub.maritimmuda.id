<?php

use App\Http\Controllers\Profile\GeneralProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::get('/profile', [GeneralProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [GeneralProfileController::class, 'update'])
        ->name('profile.update');
});

require __DIR__.'/auth.php';
