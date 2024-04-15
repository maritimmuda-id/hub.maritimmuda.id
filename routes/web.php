<?php

use App\Http\Controllers\{
    AdminShopController,
    EventController,
    FindMemberController,
    JobPostController,
    ScholarshipController,
    UserController,
    VerifyMembershipController,
    VerifyUserController,
    ViewDashboardController,
    ViewMemberCardController,
    MakeAdminController,
    StoreController,
    AnnouncementController,
    DeveloperController,
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
use Lab404\Impersonate\Controllers\ImpersonateController;

Route::redirect('/', 'login');

Route::get('/user/{id}/membership-status', [VerifyMembershipController::class, '__invoke'])
    ->name('check-membership-status');

Route::get('/template-member-card', [ViewMemberCardController::class, '__invoke'])
    ->name('template-member-card');
Route::get('/member-card/{user}/view', [ViewMemberCardController::class, '__invoke'])
    ->name('profile.member-card');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ViewDashboardController::class, '__invoke'])
        ->name('dashboard');

    Route::get('/impersonate/take/{id}/{guardName?}', [ImpersonateController::class, 'take'])
        ->name('impersonate');

    Route::get('/impersonate/leave', [ImpersonateController::class, 'leave'])
        ->name('impersonate.leave');

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

    Route::post('/users/{user}/verify', [VerifyUserController::class, '__invoke'])
        ->name('user.verify');
    Route::post('/users/{user}/make-admin', [MakeAdminController::class, 'make'])
    ->name('user.make-admin');
    Route::post('/users/{user}/make-deladmin', [MakeAdminController::class, 'delete'])
    ->name('user.make-deladmin');
    Route::resource('users', UserController::class)
        ->except(['create', 'store', 'show'])
        ->names('user');

    Route::resource('events', EventController::class)
        ->names('event');

    Route::resource('scholarships', ScholarshipController::class)
        ->names('scholarship');

    Route::resource('job-posts', JobPostController::class)
        ->names('job-post');

    Route::get('find-member', [FindMemberController::class, '__invoke'])
        ->name('find-member');

    Route::get('store', [StoreController::class, 'index'])->name('store');
    Route::get('search', [StoreController::class, 'search'])->name('search');
    Route::resource('store/admin', AdminStoreController::class)->names([
        'index' => 'store.admin.index',
        'create' => 'store.create',
        'store' => 'store.store',
        'edit' => 'store.edit',
        'update' => 'store.update',
        'destroy' => 'store.destroy',
    ]);

    Route::post('send.email', [EmailExpiredController::class, 'sendEmail'])->name('send.email');
});

require __DIR__.'/auth.php';
