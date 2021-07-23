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
Route::get('/login', [Controllers\Front\FrontController::class, 'login'])->name('login');

// 仕事選択画面
Route::get('/', [Controllers\Front\FrontController::class, 'index']);
// 仕事選択画面spaルーティング用
Route::get('/spa/{any}', function () {
    return view('front');
})->where('any', '.*');

// 管理画面側
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // 管理画面
    Route::get('/', [Controllers\Admin\AdminController::class, 'index'])->name('admin');
    // 管理画面spaルーティング用
    Route::get('/spa/{any}', function () {
        return view('admin');
    })->where('any', '.*');
});
