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
Route::get('/admin_login', [Controllers\Web\WebController::class, 'admin_login'])->name('admin.login');

// 仕事選択画面
Route::get('/', [Controllers\Web\WebController::class, 'index']);
// 仕事選択画面spaルーティング用
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
