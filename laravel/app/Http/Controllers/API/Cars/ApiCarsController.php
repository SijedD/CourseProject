<?php

namespace App\Http\Controllers\API\Cars;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarsRequest;
use App\Http\Requests\UpdateCarsRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class ApiCarsController extends Controller
{
    use AuthorizesRequests;
    public function store(StoreCarsRequest $request): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $images = $request->file('image');

        $imagePaths = [];

        foreach ($images as $image) {
            $path = $image->store('images', 'public');
            $imagePaths[] = $path;
        }


        $cars = Car::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'specifications'=> $data['specifications'],
            'engine_capacity' => $data['engine_capacity'],
            'horsepower' => $data['horsepower'],
            'transmission' => $data['transmission'],
            'image' => $imagePaths
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
        $image = $request->file('image');
        if ($image) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }

            $path = $image->store('images', 'public');

            $data['image'] = $path;

        }

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
