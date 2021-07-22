<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// ログイン系
Route::group(['prefix' => 'auth'], function () {
    Route::get('/user', function () {
        return Auth::user();
    });
    Route::get('/logout', function () {
        return Auth::logout();
    });
});

// 仕事マスタ
Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [Controllers\Admin\Master\JobController::class, 'index']);
    Route::get('/{id}', [Controllers\Admin\Master\JobController::class, 'find']);
    Route::post('/', [Controllers\Admin\Master\JobController::class, 'create'])->middleware(['auth', 'job.save.request']);
    Route::put('/{id}', [Controllers\Admin\Master\JobController::class, 'update'])->middleware(['auth', 'job.save.request']);
    Route::delete('/{id}', [Controllers\Admin\Master\JobController::class, 'destroy'])->middleware(['auth']);
    Route::get('/files/excel', [Controllers\Admin\Master\JobController::class, 'excel'])->middleware(['auth']);
});

// 仕事カテゴリ マスタ
Route::group(['prefix' => 'job_categories'], function () {
    Route::get('/', [Controllers\Admin\Master\JobCategoryController::class, 'index']);
    Route::get('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'find']);
    Route::post('/', [Controllers\Admin\Master\JobCategoryController::class, 'create'])->middleware(['auth', 'job.category.save.request']);
    Route::put('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'update'])->middleware(['auth', 'job.category.save.request']);
    Route::delete('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'destroy'])->middleware(['auth']);
    Route::get('/files/excel', [Controllers\Admin\Master\JobCategoryController::class, 'excel'])->middleware(['auth']);
});

// エントリー マスタ
Route::group(['prefix' => 'entries'], function () {
    Route::get('/', [Controllers\Admin\Master\EntryController::class, 'index']);
    Route::post('/', [Controllers\Admin\Master\EntryController::class, 'create']);
});
