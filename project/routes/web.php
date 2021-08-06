<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// ログイン画面
Route::group(['prefix' => 'login'], function () {
    Route::get('/admin', [Controllers\Web\WebController::class, 'login_admin'])->name('login.admin');
});

// 一般画面
Route::get('/', [Controllers\Web\WebController::class, 'index']);
// 一般画面spaルーティング用
Route::get('/spa/{any}', function () {
    return view('front');
})->where('any', '.*');

// 管理画面側
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    // 管理画面
    Route::get('/', [Controllers\Web\WebController::class, 'admin'])->name('admin');
    // 管理画面spaルーティング用
    Route::get('/spa/{any}', function () {
        return view('admin');
    })->where('any', '.*');
});
