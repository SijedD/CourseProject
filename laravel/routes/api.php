<?php

use App\Http\Controllers\API\Admin\ApiAdminController;
use App\Http\Controllers\API\Auth\ApiAuthController;
use App\Http\Controllers\API\Buy_car_request\ApiByCarRequestController;
use App\Http\Controllers\API\Car_in_stock\ApiCarInStockController;
use App\Http\Controllers\API\Cart\ApiCartController;
use App\Http\Controllers\API\News\ApiNewsController;
use App\Http\Controllers\API\Orders\ApiOrderController;
use App\Http\Controllers\API\Requests\ApiRequestsController;
use App\Http\Controllers\API\Service\ApiServiceController;
use App\Http\Controllers\API\Spare_parts\ApiSparePartsController;
use App\Http\Controllers\API\User\UserResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Cars\ApiCarsController;


Route::post('/registration', [ApiAuthController::class, 'register']);
Route::post('/authorization', [ApiAuthController::class, 'authorization'])->name('login');


Route::post('/reset_password', [UserResetPasswordController::class, 'sendEmail']);
Route::get('/reset_password', [UserResetPasswordController::class, 'resetPassword'])
    ->middleware('signed')
    ->name('reset_password');

    Route::get('/email/verify/{user}/{hash}', [ApiAuthController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');



Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('/cars',ApiCarsController::class);

    Route::resource('/spare_part',ApiSparePartsController::class);

    Route::resource('/news',ApiNewsController::class);

    Route::resource('/service',ApiServiceController::class);

    Route::patch('request/{requests}',[ApiRequestsController::class, 'update']);
    Route::delete('request/{requests}',[ApiRequestsController::class, 'destroy']);
    Route::get('request/{requests}',[ApiRequestsController::class, 'show']);
    Route::resource('/request', ApiRequestsController::class)->except('update','destroy','show');

    Route::get('admin/request',[ApiAdminController::class,'showRequest']);

    Route::resource('/car_in_stock',ApiCarInStockController::class);

    Route::patch('buy_car/{buyCarRequest}',[ApiByCarRequestController::class, 'update']);
    Route::delete('buy_car/{buyCarRequest}',[ApiByCarRequestController::class, 'destroy']);
    Route::get('buy_car/{buyCarRequest}',[ApiByCarRequestController::class, 'show']);
    Route::resource('/buy_car', ApiByCarRequestController::class)->except('update','destroy','show');

    Route::get('admin/buy_car',[ApiAdminController::class,'showCarRequest']);

    Route::post('/cart/{sparePart}', [ApiCartController::class, 'addToCart']);
    Route::get('/cart',[ApiCartController::class,'showCarts']);
    Route::delete('/cart/{cart}',[ApiCartController::class,'deleteToCart']);
    Route::delete('/cart',[ApiCartController::class,'deleteToAllCart']);

    Route::resource('/order',ApiOrderController::class);

    Route::get('admin/order',[ApiAdminController::class,'showOrder']);

});

