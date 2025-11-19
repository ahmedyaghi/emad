<?php

use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\TrainingOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/training-opportunities', [TrainingOpportunityController::class, 'training_opportunities'])->name('training-opportunities');
Route::get('/training-opportunities/{slug}', [TrainingOpportunityController::class, 'training_opportunity'])->name('training-opportunity');
Route::get('/articles', [ArticleController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'article'])->name('article');
Route::get('/contact-us', [ContactUsController::class, 'contact_us'])->name('contact-us');
Route::post('/contact-us', [ContactUsController::class, 'handle_contact_us'])->name('handle.contact-us');

Route::middleware('guest')->group(function () {
    Route::get('/register/{type}', [AuthController::class, 'register'])->name('register');
    Route::post('/register-individual', [AuthController::class, 'handle_register_individual'])->name('handle.register.individual');
    Route::post('/register-association', [AuthController::class, 'handle_register_association'])->name('handle.register.association');
    Route::post('/register-faculty-member', [AuthController::class, 'handle_register_faculty_member'])->name('handle.register.faculty.member');
    Route::post('/register-consultant', [AuthController::class, 'handle_register_consultant'])->name('handle.register.consultant');
    Route::post('/login', [AuthController::class, 'handle_login'])->name('handle.login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'individual', 'as' => 'individual.', 'middleware' => ['role:individual']], function () {
        Route::get('/', [App\Http\Controllers\Individual\MainController::class, 'main'])->name('main');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {});

/** Admin Routes */
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => ['auth', 'role:admin']], function () {});
});
/** Admin Routes */
