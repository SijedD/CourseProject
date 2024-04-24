<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiAuthController;

Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/authorization', [ApiAuthController::class, 'authorization']);
