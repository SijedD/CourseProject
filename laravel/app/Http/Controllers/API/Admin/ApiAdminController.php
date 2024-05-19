<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\BuyCarRequest;
use App\Models\Order;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApiAdminController
{
    use AuthorizesRequests;

    public function showCarRequest(){
        $this->authorize('Admin', User::class);

        return BuyCarRequest::paginate(10);
    }

    public function showOrder(){
        $this->authorize('Admin', User::class);

        return Order::paginate(10);
    }

    public function showRequest(){
        $this->authorize('Admin', User::class);

        return Requests::paginate(10);
    }


}
