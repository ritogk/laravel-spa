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

Auth::routes();

// 画面表示用
Route::get('/', [Controllers\Front\FrontController::class, 'index']);

// spa ルーティング用
Route::get('/spa/{any}', function () {
    return view('front');
})->where('any', '.*');

// api用
Route::prefix('/api')->group(function () {
    Route::get('/jobs', [Controllers\Front\FrontController::class, 'index_jobs']);
    Route::get('/categories', [Controllers\Front\FrontController::class, 'index_categories']);
    Route::post('/entry', [Controllers\Front\FrontController::class, 'create_entry']);
});
