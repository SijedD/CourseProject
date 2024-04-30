<?php

use App\Http\Controllers\API\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Cars\ApiCarsController;


Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/authorization', [ApiAuthController::class, 'authorization'])->name('login');
Route::resource('/cars',ApiCarsController::class);
Route::post('/cars/{car}/image', [ApiCarsController::class, 'updateImage']);
