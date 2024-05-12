<?php

namespace App\Http\Controllers\API\Requests;

use App\Http\Requests\StoreRequestsRequest;
use App\Http\Requests\UpdateRequestsRequest;
use App\Models\Requests;
use Illuminate\Http\JsonResponse;

class ApiRequestsController
{
    public function store(StoreRequestsRequest $request): JsonResponse
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $requests = Requests::create([
            "user_id"=>$userId,
            "car_id"=>$data['car_id'],
            "description"=>$data['description'],
            "status_id"=>$data['status_id'],
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'request' => $requests
        ], 201);
    }

    public function update(UpdateRequestsRequest $request,Requests $requests):JsonResponse
    {

        $data = $request->all();
        $userId = auth()->user()->id;


        $requests->update([
            "user_id"=>$userId,
            "car_id"=>$data['car_id'],
            "description"=>$data['description'],
            "status_id"=>$data['status_id'],
            "date"=>$data['date']
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'request' => $requests
        ]);
    }

    public function destroy(Requests $requests):JsonResponse
    {
        $requests->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function index()
    {

        return Requests::paginate(10);

    }

    public function show(Requests $requests)
    {
        return $requests;
    }
}