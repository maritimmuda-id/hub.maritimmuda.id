<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\Profile\ViewEducationHistoryController;
use App\Http\Controllers\Profile\GeneralProfileController;
use App\Http\Controllers\Profile\ViewAchievementHistoryController;
use App\Http\Controllers\Profile\ViewDedicationController;
use App\Http\Controllers\Profile\ViewOrganizationHistoryController;
use App\Http\Controllers\Profile\ViewPublicationController;
use App\Http\Controllers\Profile\ViewResearchController;
use App\Http\Controllers\Profile\ViewWorkExperienceController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/general', [GeneralProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/general', [GeneralProfileController::class, 'update'])
            ->name('profile.update');

        Route::get('/education-histories', [ViewEducationHistoryController::class, '__invoke'])
            ->name('profile.education-history');

        Route::get('/work-experiences', [ViewWorkExperienceController::class, '__invoke'])
            ->name('profile.work-experience');

        Route::get('/organization-histories', [ViewOrganizationHistoryController::class, '__invoke'])
            ->name('profile.organization-history');

        Route::get('/achievement-histories', [ViewAchievementHistoryController::class, '__invoke'])
            ->name('profile.achievement-history');

        Route::get('/publications', [ViewPublicationController::class, '__invoke'])
            ->name('profile.publication');

        Route::get('/dedications', [ViewDedicationController::class, '__invoke'])
            ->name('profile.dedication');

        Route::get('/researchs', [ViewResearchController::class, '__invoke'])
            ->name('profile.research');
    });

    Route::resource('user', UserController::class)
        ->only(['index', 'show', 'destroy']);

    Route::resource('event', EventController::class);

    Route::resource('scholarship', ScholarshipController::class);

    Route::resource('job-post', JobPostController::class);
});

require __DIR__.'/auth.php';
