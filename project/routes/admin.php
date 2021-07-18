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
    // 画面表示用
    Route::get('/', [Controllers\Admin\AdminController::class, 'index'])->name('admin');

    // spa ルーティング用
    Route::get('/spa/{any}', function () {
        return view('admin');
    })->where('any', '.*');

    // api用
    Route::group(['prefix' => 'api'], function () {
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
        Route::group(['prefix' => 'job_categories'], function () {
            Route::get('/', [Controllers\Admin\Master\JobCategoryController::class, 'index']);
            Route::post('/', [Controllers\Admin\Master\JobCategoryController::class, 'create'])->middleware('job.category.save.request');
            Route::get('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'find']);
            Route::put('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'update'])->middleware('job.category.save.request');
            Route::delete('/{id}', [Controllers\Admin\Master\JobCategoryController::class, 'destroy']);
            Route::post('/export_excel', [Controllers\Admin\Master\JobCategoryController::class, 'exportExcel']);
        });

        // 求職者一覧
        Route::group(['prefix' => 'entry'], function () {
            Route::post('/list', [Controllers\Admin\EntryController::class, 'list']);
            Route::post('/set_conds', [Controllers\Admin\EntryController::class, 'setConds']);
            Route::post('/get_conds', [Controllers\Admin\EntryController::class, 'getConds']);
        });
    });
});
