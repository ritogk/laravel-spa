<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| ステートフルなurlはここに書く
| postならデフォルトでcsrfが有効
|
*/

Auth::routes();

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

// ↓ 公開画面用
Route::get('/', function () {
    return view('front');
});
// 同意画面
Route::get('/agree', [Controllers\Front\AgreeController::class, 'index'])->name('agree');
// ↑ 公開画面用

