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
    Route::post('/register', [AuthController::class, 'handle_register'])->name('handle.register');
    Route::post('/login', [AuthController::class, 'handle_login'])->name('handle.login');
    Route::get('/login', function () {
        return redirect('/');
    })->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/email/verify', [AuthController::class, 'notice'])->name('verification.notice');
    Route::post('/email/verify', [AuthController::class, 'verify'])->name('verification.verify');
    Route::get('/email/resend-cdoe', [AuthController::class, 'resend_cdoe'])->name('verification.resend.code');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('profile');
        Route::get('/users/update-status/{status}/{id}', [App\Http\Controllers\Admin\UserController::class, 'update_status'])->name('users.update.status');
        Route::resource('/users', App\Http\Controllers\Admin\UserController::class)->names('users');
        Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class)->names('roles');
        Route::resource('/packages', App\Http\Controllers\Admin\PackageController::class)->names('packages');
        Route::resource('/exams', App\Http\Controllers\Admin\ExamController::class)->names('exams');
        Route::resource('/reports', App\Http\Controllers\Admin\ReportController::class)->names('reports');
        Route::resource('/associations', App\Http\Controllers\Admin\AssociationController::class)->names('associations');
        Route::get('courses/search-trainee', [App\Http\Controllers\Admin\CourseController::class, 'search_trainee'])->name('courses.search.trainee');
        Route::resource('/courses', App\Http\Controllers\Admin\CourseController::class)->names('courses');
    });

    Route::group(['prefix' => 'individual', 'as' => 'individual.', 'middleware' => ['role:individual']], function () {
        Route::get('/', [App\Http\Controllers\Individual\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Individual\ProfileController::class, 'profile'])->name('profile');
        Route::post('/profile/add-qualifications', [App\Http\Controllers\Individual\ProfileController::class, 'add_qualification'])->name('profile.add.qualification');
        Route::post('/profile/add-experiences', [App\Http\Controllers\Individual\ProfileController::class, 'add_experience'])->name('profile.add.experience');
        Route::post('/profile/add-attachments', [App\Http\Controllers\Individual\ProfileController::class, 'add_attachment'])->name('profile.add.attachment');

        Route::get('/training-opportunity-applications', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunity_applications'])->name('training-opportunity-applications');
        Route::get('/training-opportunity-applications/{slug}', [App\Http\Controllers\Individual\TrainingOpportunityController::class, 'training_opportunity_application_details'])->name('training-opportunity-application-details');
        Route::resource('training-opportunities', App\Http\Controllers\Individual\TrainingOpportunityController::class)->names('training-opportunities');
        Route::get('/courses', [App\Http\Controllers\Individual\CourseController::class, 'courses'])->name('courses');
        Route::get('/courses/{slug}', [App\Http\Controllers\Individual\CourseController::class, 'course_details'])->name('course.details');
        Route::get('/reports', [App\Http\Controllers\Individual\ReportController::class, 'reports'])->name('reports');
        Route::get('/exams', [App\Http\Controllers\Individual\ExamController::class, 'exams'])->name('exams');
        Route::get('/exams/start/{exam}', [App\Http\Controllers\Individual\ExamController::class, 'start_exam'])->name('exam.start');
        Route::post('exam/{exam}/submit', [App\Http\Controllers\Individual\ExamController::class, 'submit'])->name('exams.submit');
        Route::get('/exams/result/{exam}', [App\Http\Controllers\Individual\ExamController::class, 'exam_result'])->name('exams.result');
        Route::post('/progress/update', [App\Http\Controllers\Individual\ProgressController::class, 'update'])->name('progress.update');
    });

    Route::group(['prefix' => 'association', 'as' => 'association.', 'middleware' => ['role:association']], function () {
        Route::get('/', [App\Http\Controllers\Association\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Association\ProfileController::class, 'profile'])->name('profile');
        Route::resource('training-opportunities', App\Http\Controllers\Association\TrainingOpportunityController::class)->names('training-opportunities');
        Route::resource('reports', App\Http\Controllers\Association\ReportController::class)->names('reports');
        Route::resource('articles', App\Http\Controllers\Association\ArticleController::class)->names('articles');
        Route::resource('assessments', App\Http\Controllers\Association\AssessmentController::class)->names('assessments');
        Route::resource('trainees', App\Http\Controllers\Association\TraineeController::class)->names('trainees');
    });

    Route::group(['prefix' => 'faculty-member', 'as' => 'faculty-member.', 'middleware' => ['role:faculty-member']], function () {
        Route::get('/', [App\Http\Controllers\FacultyMember\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/trainees', [App\Http\Controllers\FacultyMember\TraineeController::class, 'trainees'])->name('trainees');
        Route::get('/reports', [App\Http\Controllers\FacultyMember\ReportController::class, 'reports'])->name('reports');
        Route::get('/profile', [App\Http\Controllers\FacultyMember\ProfileController::class, 'profile'])->name('profile');
        Route::get('/assessments', [App\Http\Controllers\FacultyMember\AssessmentController::class, 'assessments'])->name('assessments');
        Route::get('/notes', [App\Http\Controllers\FacultyMember\NoteController::class, 'notes'])->name('notes');
    });

    Route::group(['prefix' => 'consultant', 'as' => 'consultant.', 'middleware' => ['role:consultant']], function () {
        Route::get('/', [App\Http\Controllers\Consultant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Consultant\ProfileController::class, 'profile'])->name('profile');
        Route::resource('/trainees', App\Http\Controllers\Consultant\TraineeController::class)->names('trainees');
        Route::resource('/reports', App\Http\Controllers\Consultant\ReportController::class)->names('reports');
        Route::resource('/assessments', App\Http\Controllers\Consultant\AssessmentController::class)->names('assessments');
        Route::resource('/notes', App\Http\Controllers\Consultant\NoteController::class)->names('notes');
    });
});
