<?php

use App\Http\Controllers\API\Auth\ApiAuthController;
use App\Http\Controllers\API\News\ApiNewsController;
use App\Http\Controllers\API\Requests\ApiRequestsController;
use App\Http\Controllers\API\Spare_parts\ApiSparePartsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Cars\ApiCarsController;


Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/authorization', [ApiAuthController::class, 'authorization'])->name('login');
Route::resource('/cars',ApiCarsController::class);

Route::get('/email/verify/{user}/{hash}', [ApiAuthController::class, 'verify'])
    ->middleware('signed')
    ->name('verification.verify');

Route::resource('/spare_part',ApiSparePartsController::class);
Route::resource('/news',ApiNewsController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::patch('request/{requests}',[ApiRequestsController::class, 'update']);
    Route::delete('request/{requests}',[ApiRequestsController::class, 'destroy']);
    Route::get('request/{requests}',[ApiRequestsController::class, 'show']);
    Route::resource('/request', ApiRequestsController::class)->except('update','destroy','show');
});
