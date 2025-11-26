<?php

use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\TrainingOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/training-opportunities', [TrainingOpportunityController::class, 'training_opportunities'])->name('training-opportunities');
Route::get('/training-opportunities/{slug}', [TrainingOpportunityController::class, 'training_opportunity'])->name('training-opportunity');
Route::get('/articles', [ArticleController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'article'])->name('article');
Route::get('/contact-us', [ContactUsController::class, 'contact_us'])->name('contact-us');
Route::post('/contact-us', [ContactUsController::class, 'handle_contact_us'])->name('handle.contact-us');
Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'news_details'])->name('news.details');

Route::middleware('guest')->group(function () {
    Route::get('/register/{type}', [AuthController::class, 'register'])->name('register');
    Route::post('/register/{type}', [AuthController::class, 'handle_register'])->name('handle.register');
    Route::post('/login', [AuthController::class, 'handle_login'])->name('handle.login');
    Route::get('/login', function () {
        return redirect('/');
    })->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('profile');
        Route::get('/exams', [App\Http\Controllers\Admin\ExamController::class, 'exams'])->name('exams');
        Route::get('/courses', [App\Http\Controllers\Admin\CourseController::class, 'courses'])->name('courses');
        Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'reports'])->name('reports');
        Route::get('/packages', [App\Http\Controllers\Admin\PackageController::class, 'packages'])->name('packages');
        Route::get('/associations', [App\Http\Controllers\Admin\AssociationController::class, 'associations'])->name('associations');
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'users'])->name('users');
    });

    Route::group(['prefix' => 'individual', 'as' => 'individual.', 'middleware' => ['role:individual']], function () {
        Route::get('/', [App\Http\Controllers\Individual\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Individual\ProfileController::class, 'profile'])->name('profile');
        Route::get('/training-opportunities', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunities'])->name('training-opportunities');
        Route::get('/training-opportunities/{slug}', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunity'])->name('training-opportunity');
        Route::post('/training-opportunities', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'apply_training_opportunities'])->name('training-opportunities.apply');
        Route::get('/training-opportunity-applications', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunity_applications'])->name('training-opportunity-applications');
        Route::get('/training-opportunity-applications/{slug}', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunity_application_details'])->name('training-opportunity-application-details');
        Route::get('/courses', [App\Http\Controllers\Individual\CourseController::class, 'courses'])->name('courses');
        Route::get('/courses/{slug}', [App\Http\Controllers\Individual\CourseController::class, 'course_details'])->name('course.details');

        Route::get('/reports', [App\Http\Controllers\Individual\ReportController::class, 'reports'])->name('reports');
        Route::get('/exams', [App\Http\Controllers\Individual\ExamController::class, 'exams'])->name('exams');
    });

    Route::group(['prefix' => 'association', 'as' => 'association.', 'middleware' => ['role:association']], function () {
        Route::get('/', [App\Http\Controllers\Association\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Association\ProfileController::class, 'profile'])->name('profile');
        Route::get('/training-opportunities', [App\Http\Controllers\Association\TrainingOpportunityController::class, 'training_opportunities'])->name('training-opportunities');
        Route::get('/training-opportunities/{slug}', [App\Http\Controllers\Association\TrainingOpportunityController::class, 'training_opportunity'])->name('training-opportunity');
        Route::get('/trainees', [App\Http\Controllers\Association\TraineeController::class, 'trainees'])->name('trainees');
        Route::get('/reports', [App\Http\Controllers\Association\ReportController::class, 'reports'])->name('reports');
        Route::get('/articles', [App\Http\Controllers\Association\ArticleController::class, 'articles'])->name('articles');
        Route::get('/assessments', [App\Http\Controllers\Association\AssessmentController::class, 'assessments'])->name('assessments');
    });

    Route::group(['prefix' => 'faculty-member', 'as' => 'faculty-member.', 'middleware' => ['role:faculty-member']], function () {
        Route::get('/', [App\Http\Controllers\FacultyMember\DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::group(['prefix' => 'consultant', 'as' => 'consultant.', 'middleware' => ['role:consultant']], function () {
        Route::get('/', [App\Http\Controllers\Consultant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Consultant\ProfileController::class, 'profile'])->name('profile');
        Route::get('/trainees', [App\Http\Controllers\Consultant\TraineeController::class, 'trainees'])->name('trainees');
        Route::get('/reports', [App\Http\Controllers\Consultant\ReportController::class, 'reports'])->name('reports');
        Route::get('/assessments', [App\Http\Controllers\Consultant\AssessmentController::class, 'assessments'])->name('assessments');
        Route::get('/notes', [App\Http\Controllers\Consultant\NoteController::class, 'notes'])->name('notes');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {});
