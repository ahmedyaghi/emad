<?php

use App\Http\Controllers\Site\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('main');

Route::middleware('guest')->group(function () {});

Route::middleware(['auth'])->group(function () {});

Route::middleware(['auth', 'verified'])->group(function () {});

/** Admin Routes */
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => ['auth', 'role:admin']], function () {});
});
/** Admin Routes */
