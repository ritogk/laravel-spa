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

Auth::routes();

// フロント画面
Route::get('/', [Controllers\Front\FrontController::class, 'index']);

// フロント画面spa用
Route::get('/front/{any}', function () {
    return view('front');
})->where('any', '.*');

Route::prefix('api/front')->group(function () {
    Route::get('/jobs', [Controllers\Front\FrontController::class, 'index_jobs']);
    Route::get('/categories', [Controllers\Front\FrontController::class, 'index_categories']);
    Route::post('/entry', [Controllers\Front\FrontController::class, 'store_entry']);
});

// 共通
Route::prefix('/utility')->group(function () {
    Route::post('/empty_table_columns', [Controllers\UtilityController::class, 'getEmptyTableColumns']);
    Route::get('/general_code', function () {
        return App\Libs\Consts::getConstants();
    });
    Route::get('/general_code_value', function () {
        return App\Libs\Consts::getFlipConstants();
    });
});
