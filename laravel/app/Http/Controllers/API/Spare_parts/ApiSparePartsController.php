<?php

namespace App\Http\Controllers\API\Spare_parts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSparePartsRequest;
use App\Http\Requests\UpdateSparePartsRequest;
use App\Models\SparePart;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiSparePartsController extends Controller
{
    use AuthorizesRequests;
    public function store(StoreSparePartsRequest $request): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $spare_part = SparePart::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'categories_id' => $data['categories_id'],
            'image' => $path
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'spare_part' => $spare_part
        ], 201);
    }

    public function update(UpdateSparePartsRequest $request,SparePart $spare_part):JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $image = $request->file('image');
        if ($image) {
            if ($spare_part->image) {
                Storage::disk('public')->delete($spare_part->image);
            }

            $path = $image->store('images', 'public');

            $data['image'] = $path;

        }

        $spare_part->update([
            ...$data
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'spare_part' => $spare_part
        ]);
    }

    public function destroy(SparePart $spare_part):JsonResponse
    {
        $this->authorize('Admin', User::class);

        $spare_part->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function index(Request $request)
    {

        return SparePart::filter($request->all())
            ->orderBy('categories_id','desc')
            ->paginate(10);

    }

    public function show(SparePart $spare_part)
    {
        return $spare_part;
    }
}
