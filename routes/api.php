<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::put('resetPassword', [AuthController::class, 'changePassword']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('{product:slug}', [ProductController::class, 'search']);

        Route::group(['prefix' => 'comments'], function () {
            Route::post('new/{product:slug}', [ProductController::class, 'newComment']);
        });
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::post('createProduct', [ProductController::class, 'create']);
        Route::put('updateProduct/{product:slug}', [ProductController::class, 'update']);
        Route::delete('destroyProduct/{product:slug}', [ProductController::class, 'destroy']);
    });
});
