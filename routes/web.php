<?php

use App\Http\Controllers\{
    EventController,
    FindMemberController,
    JobPostController,
    ScholarshipController,
    UserController,
    ViewDashboardController,
};
use App\Http\Controllers\Profile\{
    ChangePasswordController,
    GeneralProfileController,
    ViewAchievementHistoryController,
    ViewDedicationController,
    ViewEducationHistoryController,
    ViewOrganizationHistoryController,
    ViewPublicationController,
    ViewResearchController,
    ViewWorkExperienceController,
};
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::impersonate();

    Route::get('/dashboard', [ViewDashboardController::class, '__invoke'])
        ->name('dashboard');

    Route::group(['prefix' => '/profile'], function () {
        Route::get('/general', [GeneralProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/general', [GeneralProfileController::class, 'update'])
            ->name('profile.update');

        Route::patch('/change-password', [ChangePasswordController::class, '__invoke'])
            ->name('profile.change-password');

        Route::get('/educations', [ViewEducationHistoryController::class, '__invoke'])
            ->name('profile.education-history');

        Route::get('/work-experiences', [ViewWorkExperienceController::class, '__invoke'])
            ->name('profile.work-experience');

        Route::get('/organizations', [ViewOrganizationHistoryController::class, '__invoke'])
            ->name('profile.organization-history');

        Route::get('/achievements', [ViewAchievementHistoryController::class, '__invoke'])
            ->name('profile.achievement-history');

        Route::get('/publications', [ViewPublicationController::class, '__invoke'])
            ->name('profile.publication');

        Route::get('/social-activities', [ViewDedicationController::class, '__invoke'])
            ->name('profile.dedication');

        Route::get('/researches', [ViewResearchController::class, '__invoke'])
            ->name('profile.research');
    });

    Route::resource('users', UserController::class)
        ->only(['index', 'destroy'])
        ->names('user');

    Route::resource('events', EventController::class)
        ->names('event');

    Route::resource('scholarships', ScholarshipController::class)
        ->names('scholarship');

    Route::resource('job-posts', JobPostController::class)
        ->names('job-post');

    Route::get('find-member', [FindMemberController::class, '__invoke'])
        ->name('find-member');
});

require __DIR__.'/auth.php';
