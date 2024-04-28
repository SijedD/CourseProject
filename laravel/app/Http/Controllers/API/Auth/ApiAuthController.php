<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class ApiAuthController extends Controller
{
    use HasApiTokens;

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password'])
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Success',
            'token' => $user->createToken('authToken')->plainTextToken
        ], 201);
    }

    public function authorization(LoginUserRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            throw new ApiException(401, 'Authorization failed');
        }

        $user = $request->user();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success',
            'token' => $user->createToken('authToken')->plainTextToken
        ], 200);

    }

}
