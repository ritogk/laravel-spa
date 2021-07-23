<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
*/

// 仕事選択画面
Route::get('/', [Controllers\Front\FrontController::class, 'index']);

// spa ルーティング用
Route::get('/spa/{any}', function () {
    return view('front');
})->where('any', '.*');

// ログイン画面
Route::get('/login', [Controllers\Front\FrontController::class, 'login'])->name('login');
