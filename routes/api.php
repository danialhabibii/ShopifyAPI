<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cart\CartController;
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
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'viewCart']);
        Route::post('new/{product:slug}', [CartController::class, 'addToCart']);
        Route::delete('singleDestroy/{cart:slug}', [CartController::class, 'singleDestroy']);
        Route::delete('destroy', [CartController::class, 'destroyCart']);
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::post('createProduct', [ProductController::class, 'create']);
        Route::put('updateProduct/{product:slug}', [ProductController::class, 'update']);
        Route::delete('destroyProduct/{product:slug}', [ProductController::class, 'destroy']);
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/', [AdminController::class, 'report']);
            Route::get('{category:title}', [AdminController::class, 'categoryReport']);
        });
    });
});
