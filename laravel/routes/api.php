<?php

use App\Http\Controllers\API\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;


Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/authorization', [ApiAuthController::class, 'authorization'])->name('login');

