<?php

namespace App\Http\Controllers\API\Car_in_stock;

use App\Http\Requests\StoreCarInStockRequest;
use App\Http\Requests\UpdateCarInStockRequest;
use App\Models\CarInStock;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;

class ApiCarInStockController
{
    use AuthorizesRequests;
    public function store(StoreCarInStockRequest $request): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $cars = CarInStock::create([
            'car_id'=>$data['car_id'],
            'price'=>$data['price']
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'car' => $cars
        ], 201);
    }

    public function update(UpdateCarInStockRequest $request, CarInStock $carInStock): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();

        $carInStock->update([
            ...$data
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'car' => $carInStock
        ], 200);
    }

    public function destroy(CarInStock $carInStock):JsonResponse
    {
        $this->authorize('Admin', User::class);

        $carInStock->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
        ], 200);

    }

    public function index()
    {

        return CarInStock::paginate(10);

    }

    public function show(CarInStock $carInStock)
    {
        return $carInStock;
    }
}
