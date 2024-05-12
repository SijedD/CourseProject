<?php

namespace App\Http\Controllers\API\Requests;

use App\Http\Requests\StoreRequestsRequest;
use App\Http\Requests\UpdateRequestsRequest;
use App\Models\Requests;
use App\Models\Service_in_request;
use Illuminate\Database\Eloquent\Model;
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

        $servicesInRequest = [];

        foreach ($data['service_id'] as $serviceId) {
            $serviceInRequest = Service_in_request::create([
                "request_id" => $requests->id,
                "service_id" => $serviceId
            ]);
            $servicesInRequest[] = $serviceInRequest;
        }

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'request' => $requests,
            'serviceInRequest'=>$servicesInRequest
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

        return Requests::with('services')->paginate(10);

    }

    public function show(Requests $requests)
    {
        return $requests;
    }
}
