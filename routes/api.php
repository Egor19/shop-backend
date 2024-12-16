<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/products/filter', App\Http\Controllers\API\Product\ProductFilterController::class);
Route::get('/products', App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/list', App\Http\Controllers\API\Product\FilterListController::class);

Route::middleware(['stateful', 'auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});