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

    // 汎用マスタ
    Route::group(['prefix' => 'general', 'middleware' => 'auth'], function () {
        Route::post('/list', [Controllers\Admin\Master\GeneralController::class, 'list']);
        Route::post('/create', [Controllers\Admin\Master\GeneralController::class, 'create']);
        Route::delete('/{id}', [Controllers\Admin\Master\GeneralController::class, 'destroy']);
        Route::put('/{id}', [Controllers\Admin\Master\GeneralController::class, 'update']);
        Route::post('/set_conds', [Controllers\Admin\Master\GeneralController::class, 'setConds']);
        Route::post('/get_conds', [Controllers\Admin\Master\GeneralController::class, 'getConds']);
        Route::post('/export_excel', [Controllers\Admin\Master\GeneralController::class, 'exportExcel']);
    });
});
