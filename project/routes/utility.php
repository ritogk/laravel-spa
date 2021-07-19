<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Utility Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/empty_table_columns', [Controllers\UtilityController::class, 'emptyTableColumns']);
Route::get('/general_code', function () {
    return App\Libs\Consts::getConstants();
});
Route::get('/general_code_value', function () {
    return App\Libs\Consts::getFlipConstants();
});

