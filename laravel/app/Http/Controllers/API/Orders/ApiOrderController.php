<?php

namespace App\Http\Controllers\API\Orders;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiOrderController
{
    use AuthorizesRequests;
    public function store(Request $request,Cart $cart): JsonResponse
    {
        $userId = auth()->user()->id;
        $totalPrice = 0;

        $cartItems = Cart::where('user_id', $userId)->get();

        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->price;

        }


        $order = Order::create([
            'user_id'=>$userId,
            'total_price'=>$totalPrice,
            'status_id'
        ]);


        $cartItems->each(function ($item) use ($order) {
            OrderItems::create([
                'order_id' => $order->id,
                'spare_parts_id' => $item->spare_parts_id,
                'quantity' => $item->quantity,
            ]);
        });

        Cart::where('user_id', $userId)->delete();

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'order' => $order,
            'cartItems'=>$cartItems
        ], 201);
    }


    public function destroy(Order $order):JsonResponse
    {
        if ($order->status_id === 2){
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => 'Статус в пути'
            ],422);
        }
        else{
        $order->delete();}

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function update(UpdateOrderRequest $request,Order $order):JsonResponse
    {

        $this->authorize('Admin', User::class);

        $data = $request->all();

        $order->update([
            ...$data
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'order' => $order
        ]);
    }

    public function index()
    {
        return Order::where('user_id', auth()->user()->id)->paginate(10);
    }

    public function show(Order $order)
    {
        return Order::find($order->id);
    }

}
