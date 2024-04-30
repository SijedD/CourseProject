<?php

namespace App\Http\Controllers\API\Cars;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarsRequest;
use App\Http\Requests\UpdateCarsRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiCarsController extends Controller
{

    public function store(StoreCarsRequest $request): JsonResponse
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $cars = Car::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'engine_capacity' => $data['engine_capacity'],
            'horsepower' => $data['horsepower'],
            'transmission' => $data['transmission'],
            'image' => 'images/'.$imageName
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'car' => $cars
        ], 201);
    }

    public function update(UpdateCarsRequest $request,Car $car):JsonResponse
    {
        $data = $request->all();

        $car->update([
            ...$data
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'car' => $car
        ]);
    }

    public function updateImage(Request $request,Car $car):JsonResponse
    {
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);
        $path = 'images/'.$imageName;

        $car->update(['image' => $path]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success',
            'car' => $car
        ]);
    }

    public function destroy(Car $car):JsonResponse
    {
        $car->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function index()
    {

        return Car::paginate(10);

    }

    public function show(Car $car)
    {
        return $car;
    }

}
