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
    EducationController,
    WorkExperienceController,
    OrganizationController,
    AchievementController,
    PublicationController,
    DedicationController,
    ResearchController,
};

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Middleware\CheckToken;
use App\Http\Middleware\CheckTokenAndVerified;
use Lab404\Impersonate\Controllers\ImpersonateController;
use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum', 'check.token.verified'])->group(function (){
    Route::get('/dashboard', [ViewDashboardController::class, 'apiDashboard']);
    
    Route::group(['prefix' => '/profile'], function (){
        Route::get('/general', [GeneralProfileController::class, 'apiEdit']);
        Route::post('/general', [GeneralProfileController::class, 'apiUpdate']);

        Route::patch('/change-password', [ChangePasswordController::class, 'apiChangePass']);

        Route::get('/educations', [ViewEducationHistoryController::class, 'apiEdu']);
        Route::post('/educations', [EducationController::class, 'apiStore']);
        Route::patch('/educations/{id}', [EducationController::class, 'apiEdit']);
        Route::delete('/educations/{id}', [EducationController::class, 'apiDelete']);

        Route::get('/work-experiences', [ViewWorkExperienceController::class, 'apiWork']);
        Route::post('/work-experiences', [WorkExperienceController::class, 'apiStore']);
        Route::patch('/work-experiences/{id}', [WorkExperienceController::class, 'apiEdit']);
        Route::delete('/work-experiences/{id}', [WorkExperienceController::class, 'apiDelete']);

        Route::get('/organizations', [ViewOrganizationHistoryController::class, 'apiOrg']);
        Route::post('/organizations', [OrganizationController::class, 'apiStore']);
        Route::patch('/organizations/{id}', [OrganizationController::class, 'apiEdit']);
        Route::delete('/organizations/{id}', [OrganizationController::class, 'apiDelete']);

        Route::get('/achievements', [ViewAchievementHistoryController::class, 'apiAcv']);
        Route::post('/achievements', [AchievementController::class, 'apiStore']);
        Route::patch('/achievements/{id}', [AchievementController::class, 'apiEdit']);
        Route::delete('/achievements/{id}', [AchievementController::class, 'apiDelete']);

        Route::get('/publications', [ViewPublicationController::class, 'apiPub']);
        Route::post('/publications', [PublicationController::class, 'apiStore']);
        Route::patch('/publications/{id}', [PublicationController::class, 'apiEdit']);
        Route::delete('/publications/{id}', [PublicationController::class, 'apiDelete']);

        Route::get('/social-activities', [ViewDedicationController::class, 'apiDed']);
        Route::post('/social-activities', [DedicationController::class, 'apiStore']);
        Route::patch('/social-activities/{id}', [DedicationController::class, 'apiEdit']);
        Route::delete('/social-activities/{id}', [DedicationController::class, 'apiDelete']);

        Route::get('/researches', [ViewResearchController::class, 'apiRsc']);
        Route::post('/researches', [ResearchController::class, 'apiStore']);
        Route::patch('/researches/{id}', [ResearchController::class, 'apiEdit']);
        Route::delete('/researches/{id}', [ResearchController::class, 'apiDelete']);
    });
    
    Route::get('find-member', [FindMemberController::class, 'apiMember']);
    Route::get('/user/{email}/find-member', [FindMemberController::class, 'apiVerifyUid']);
    Route::get('events', [EventController::class, 'api']);
    Route::get('scholarships', [ScholarshipController::class, 'apiScholar']);
    Route::get('job-posts', [JobPostController::class, 'apiJobPost']);
    Route::get('store', [StoreController::class, 'indexApi']);
});
