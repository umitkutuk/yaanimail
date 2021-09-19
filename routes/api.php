<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth::routes();
Route::post('users', [\App\Http\Controllers\UserController::class, 'store']);
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('users/verify-email', [\App\Http\Controllers\UserController::class, 'verifyEmail']);
    Route::post('users/verify-phone', [\App\Http\Controllers\UserController::class, 'verifyPhone']);

    Route::post('feeds/collect', [\App\Http\Controllers\FeedController::class, 'collectFeed']);
    Route::apiResource('feeds', \App\Http\Controllers\FeedController::class);
});

//Route::apiResource('users', \App\Http\Controllers\UserController::class);

