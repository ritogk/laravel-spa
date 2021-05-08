<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['admin']], function () {
    Route::get('/', [Controllers\Admin\AdminController::class, 'index'])->name('admin');

    Route::group(['prefix' => 'auth'], function () {
        // ユーザー情報取得
        Route::middleware('auth:web')->get('/user', function () {
            return Auth::user();
        });
        // ログアウト
        Route::middleware('auth:web')->get('/logout', function () {
            return Auth::logout();
        });
    });

    // 管理画面spa用
    Route::get('/{any}', function () {
        return view('admin');
    })->where('any', '.*');

    // 仕事 マスタ
    Route::group(['prefix' => 'job'], function () {
        Route::post('/list', [Controllers\Admin\Master\JobController::class, 'list']);
        Route::post('/create', [Controllers\Admin\Master\JobController::class, 'create'])->middleware('job.save.request');
        Route::delete('/{id}', [Controllers\Admin\Master\JobController::class, 'destroy']);
        Route::post('/find', [Controllers\Admin\Master\JobController::class, 'find']);
        Route::post('/update', [Controllers\Admin\Master\JobController::class, 'update'])->middleware('job.save.request');
        Route::post('/set_conds', [Controllers\Admin\Master\JobController::class, 'setConds']);
        Route::post('/get_conds', [Controllers\Admin\Master\JobController::class, 'getConds']);
        Route::post('/export_excel', [Controllers\Admin\Master\JobController::class, 'exportExcel']);
    });

    // 仕事カテゴリ マスタ
    Route::group(['prefix' => 'job_category'], function () {
        Route::post('/list', [Controllers\Admin\Master\JobCategoryController::class, 'list']);
        Route::post('/create', [Controllers\Admin\Master\JobCategoryController::class, 'create']);
        Route::delete('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'destroy']);
        Route::put('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'update']);
        Route::post('/set_conds', [Controllers\Admin\Master\JobCategoryController::class, 'setConds']);
        Route::post('/get_conds', [Controllers\Admin\Master\JobCategoryController::class, 'getConds']);
        Route::post('/export_excel', [Controllers\Admin\Master\JobCategoryController::class, 'exportExcel']);
    });

    // 汎用マスタ
    Route::group(['prefix' => 'general'], function () {
        Route::post('/list', [Controllers\Admin\Master\GeneralController::class, 'list']);
        Route::post('/create', [Controllers\Admin\Master\GeneralController::class, 'create']);
        Route::delete('/{id}', [Controllers\Admin\Master\GeneralController::class, 'destroy']);
        Route::put('/{id}', [Controllers\Admin\Master\GeneralController::class, 'update']);
        Route::post('/set_conds', [Controllers\Admin\Master\GeneralController::class, 'setConds']);
        Route::post('/get_conds', [Controllers\Admin\Master\GeneralController::class, 'getConds']);
        Route::post('/export_excel', [Controllers\Admin\Master\GeneralController::class, 'exportExcel']);
    });
});
