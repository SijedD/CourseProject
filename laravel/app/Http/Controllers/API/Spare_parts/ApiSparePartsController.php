<?php

namespace App\Http\Controllers\API\Spare_parts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSparePartsRequest;
use App\Http\Requests\UpdateSparePartsRequest;
use App\Models\SparePart;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ApiSparePartsController extends Controller
{
    public function store(StoreSparePartsRequest $request): JsonResponse
    {
        $data = $request->all();
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $spare_part = SparePart::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'catigories_id' => $data['catigories_id'],
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
            ->orderBy('catigories_id','desc')
            ->paginate(10);

    }

    public function show(SparePart $spare_part)
    {
        return $spare_part;
    }
}
