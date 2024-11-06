<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Middleware\AuthApi;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware(AuthApi::class);

Route::apiResource('/orders', OrderController::class)->middleware(AuthApi::class);
