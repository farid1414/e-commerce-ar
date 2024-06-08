<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Master\CategoryController;
use App\Http\Controllers\Api\Master\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::prefix('/category')->name('category.')->group(function () {
    Route::post('/', [CategoryController::class, 'store']);
    Route::post('/status', [CategoryController::class, 'status']);
    Route::delete('/delete/{id?}', [CategoryController::class, 'delete']);
});


Route::prefix('/product')->name('product.')->group(function () {
    // Route::post('/', [ProductController::class, 'store']);
});
