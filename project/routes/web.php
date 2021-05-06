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

// 同意画面
Route::get('/', [Controllers\Front\FrontController::class, 'index']);

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
