<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

// 画面表示用
Route::get('/', [Controllers\Admin\AdminController::class, 'index'])->name('admin');

// spa ルーティング用
Route::get('/spa/{any}', function () {
    return view('admin');
})->where('any', '.*');
