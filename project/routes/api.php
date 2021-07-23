<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
*/

// ユーザー認証系
Route::group(['prefix' => 'auth'], function () {
    Route::get('/user', [Controllers\Api\AuthController::class, 'user']);
    Route::post('/login', [Controllers\Api\AuthController::class, 'login']);
    Route::post('/logout', [Controllers\Api\AuthController::class, 'logout']);
});

// 仕事マスタ
Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [Controllers\Api\Master\JobController::class, 'index']);
    Route::get('/{id}', [Controllers\Api\Master\JobController::class, 'find']);
    Route::post('/', [Controllers\Api\Master\JobController::class, 'create'])->middleware(['auth', 'job.save.request']);
    Route::put('/{id}', [Controllers\Api\Master\JobController::class, 'update'])->middleware(['auth', 'job.save.request']);
    Route::delete('/{id}', [Controllers\Api\Master\JobController::class, 'destroy'])->middleware(['auth']);
    Route::get('/files/excel', [Controllers\Api\Master\JobController::class, 'excel'])->middleware(['auth']);
});

// 仕事カテゴリ マスタ
Route::group(['prefix' => 'job_categories'], function () {
    Route::get('/', [Controllers\Api\Master\JobCategoryController::class, 'index']);
    Route::get('/{id}', [Controllers\Api\Master\JobCategoryController::class, 'find']);
    Route::post('/', [Controllers\Api\Master\JobCategoryController::class, 'create'])->middleware(['auth', 'job.category.save.request']);
    Route::put('/{id}', [Controllers\Api\Master\JobCategoryController::class, 'update'])->middleware(['auth', 'job.category.save.request']);
    Route::delete('/{id}', [Controllers\Api\Master\JobCategoryController::class, 'destroy'])->middleware(['auth']);
    Route::get('/files/excel', [Controllers\Api\Master\JobCategoryController::class, 'excel'])->middleware(['auth']);
});

// エントリー マスタ
Route::group(['prefix' => 'entries'], function () {
    Route::get('/', [Controllers\Api\Master\EntryController::class, 'index']);
    Route::post('/', [Controllers\Api\Master\EntryController::class, 'create']);
});
