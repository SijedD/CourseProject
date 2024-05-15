<?php

namespace App\Http\Controllers\API\Cart;

use App\Models\Cart;
use App\Models\SparePart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiCartController
{
    public function addToCart(Request $request, SparePart $sparePart)
    {

        $user = $request->user();
        $quantity = $request->input('quantity');


        $cartItem = Cart::where('user_id', $user->id)
            ->where('spare_parts_id', $sparePart->id)
            ->first();


        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            $user->carts()->create([
                'spare_parts_id' => $sparePart->id,
                'quantity' => $quantity,
            ]);
        }

        return response()->json(['message' => 'Товар успешно добавлен в корзину'], 200);
    }

    public function showCarts(Request $request){
        return auth()->user()->carts;
    }

    public function deleteToCart(Cart $cart):JsonResponse
    {

        $cart->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);

    }

    public function deleteToAllCart(Cart $cart):JsonResponse
    {

        $user_id = auth()->id();

        $userCartItems = Cart::where('user_id', $user_id)->get();

        if ($userCartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Корзина пуста'
            ], 404);
        }

        foreach ($userCartItems as $cartItem) {
            $cartItem->delete();
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }
}
