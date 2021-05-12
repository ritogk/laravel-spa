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

Route::prefix('/front')->group(function () {
    Route::post('/jobs', [Controllers\Front\FrontController::class, 'searchJobs']);
    Route::post('/categories', [Controllers\Front\FrontController::class, 'categories']);
    Route::post('/save/entry', [Controllers\Front\FrontController::class, 'save_entry']);
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
