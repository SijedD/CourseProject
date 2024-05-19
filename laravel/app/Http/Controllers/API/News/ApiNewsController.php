<?php

namespace App\Http\Controllers\API\News;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiNewsController
{
    use AuthorizesRequests;
    public function store(StoreNewsRequest $request): JsonResponse
    {
        $this->authorize('Admin', User::class);

        $data = $request->all();
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $news = News::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $path
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'massage' => 'Success',
            'news' => $news
        ], 201);
    }

    public function update(UpdateNewsRequest $request,News $news):JsonResponse
    {

        $this->authorize('Admin', User::class);

        $data = $request->all();
        $image = $request->file('image');
        if ($image) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $path = $image->store('images', 'public');

            $data['image'] = $path;

        }

        $news->update([
            ...$data
        ]);

        return response()->json([
            'success' => true,
            'code' => 200,
            'massage' => 'Success',
            'news' => $news
        ]);
    }

    public function destroy(News $news):JsonResponse
    {
        $this->authorize('Admin', User::class);

        $news->delete();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Success'
        ]);
    }

    public function index()
    {

        return News::paginate(10);

    }

    public function show(News $news)
    {
        return $news;
    }
}
