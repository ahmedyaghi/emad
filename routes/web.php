<?php

use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\TrainingOpportunityController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/training-opportunities', [TrainingOpportunityController::class, 'training_opportunities'])->name('training-opportunities');
Route::get('/training-opportunities/{slug}', [TrainingOpportunityController::class, 'training_opportunity'])->name('training-opportunity');

Route::get('/articles', [ArticleController::class, 'articles'])->name('articles');
Route::get('/contact-us', [ContactUsController::class, 'contact_us'])->name('contact-us');

Route::middleware('guest')->group(function () {});

Route::middleware(['auth'])->group(function () {});

Route::middleware(['auth', 'verified'])->group(function () {});

/** Admin Routes */
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => ['auth', 'role:admin']], function () {});
});
/** Admin Routes */
