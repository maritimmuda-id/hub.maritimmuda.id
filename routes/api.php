<?php

use App\Http\Controllers\{
    AdminStoreController,
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
    SendEmailController,
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

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Middleware\CheckToken;
use Illuminate\Http\Request;
use Lab404\Impersonate\Controllers\ImpersonateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('mail', SendEmailController::class);

Route::get('/user/{id}/membership-status', [VerifyMembershipController::class, 'apiVerifyMembership']);

Route::get('/user/{email}/check-uid', [VerifyMembershipController::class, 'apiVerifyUid']);

Route::post('/register', [RegisteredUserController::class, 'apiStore']);

Route::post('/login', [AuthenticatedSessionController::class, 'apiStore']);

Route::post('/forgot-password', [PasswordResetLinkController::class, 'apiForgotPassword']);

Route::middleware('check.token')->get('events', [EventController::class, 'api']);

Route::middleware('check.token')->get('scholarships', [ScholarshipController::class, 'apiScholar']);

Route::middleware('check.token')->get('job-posts', [JobPostController::class, 'apiJobPost']);

Route::middleware('check.token')->get('find-member', [FindMemberController::class, 'apiMember']);


