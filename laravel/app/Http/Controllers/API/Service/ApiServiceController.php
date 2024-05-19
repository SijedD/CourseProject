<?php

namespace App\Http\Controllers\API\Service;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Models\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;


class ApiServiceController
{
    use AuthorizesRequests;
    public function store(StoreServiceRequest $request): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $service = Service::create([
            "name"=>$data['name'],
            "description"=>$data['description'],
            "price"=>$data['price']
        ]);

        return response()->json([
            'success'=> true,
            "code"=>201,
            'massage'=>'success',
            'service'=>$service
        ]);
    }

    public function update(UpdateServiceRequest $request,Service $service): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();

        $service->update([
            ...$data
        ]);

        return response()->json([
            'success'=> true,
            "code"=>200,
            'massage'=>'success',
            'service'=>$service
        ]);
    }

    public function destroy(Service $service): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $service->delete();

        return response()->json([
            'success'=> true,
            "code"=>200,
            'massage'=>'success'

        ]);
    }

    public function index()
    {
        return Service::paginate(10);
    }

    public function show(Service $service){
        return $service;
    }
}
