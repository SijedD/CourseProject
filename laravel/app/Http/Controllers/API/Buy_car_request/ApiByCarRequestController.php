<?php

namespace App\Http\Controllers\API\Buy_car_request;

use App\Http\Requests\StoreBuyCarRequest;
use App\Http\Requests\UpdateBuyCarRequest;
use App\Models\BuyCarRequest;
use Illuminate\Http\JsonResponse;

class ApiByCarRequestController
{
    public function store(StoreBuyCarRequest $request): JsonResponse
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $requests = BuyCarRequest::create([
            "user_id"=>$userId,
            "car_id"=>$data['car_id'],
            "status_id"=>$data['status_id'],
        ]);


        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'buyCarRequest'=>$requests
        ], 201);
    }

    public function update(UpdateBuyCarRequest $request,BuyCarRequest $buyCarRequest):JsonResponse
    {

        $data = $request->all();
        $userId = auth()->user()->id;


        $buyCarRequest->update([
            "user_id"=>$userId,
            "car_id"=>$data['car_id'],
            "date"=>$data['date'],
            "status_id"=>$data['status_id']
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'buyCarRequest' => $buyCarRequest
        ]);
    }

    public function destroy(BuyCarRequest $buyCarRequest):JsonResponse
    {
        $buyCarRequest->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function index()
    {

        return BuyCarRequest::where('user_id', auth()->user()->id)->paginate(10);

    }

    public function show(BuyCarRequest $buyCarRequest)
    {
        return $buyCarRequest;
    }
}
