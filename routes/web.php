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
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::group(['prefix' => 'individual', 'as' => 'individual.', 'middleware' => ['role:individual']], function () {
        Route::get('/', [App\Http\Controllers\Individual\DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::group(['prefix' => 'association', 'as' => 'association.', 'middleware' => ['role:association']], function () {
        Route::get('/', [App\Http\Controllers\Association\DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::group(['prefix' => 'faculty-member', 'as' => 'faculty-member.', 'middleware' => ['role:faculty-member']], function () {
        Route::get('/', [App\Http\Controllers\FacultyMember\DashboardController::class, 'dashboard'])->name('dashboard');
    });

    Route::group(['prefix' => 'consultant', 'as' => 'consultant.', 'middleware' => ['role:consultant']], function () {
        Route::get('/', [App\Http\Controllers\Consultant\DashboardController::class, 'dashboard'])->name('dashboard');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {});
