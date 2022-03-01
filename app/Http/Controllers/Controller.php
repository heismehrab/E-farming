<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function details(Request $request): JsonResponse
    {
        if (! $request->headers->has('apiToken')) {
            return response()
                ->json([
                    'data' => []
                ], 400);
        }

        if ($request->headers->get('apiToken') !== env('API_TOKEN')) {
            return response()
                ->json([
                    'data' => []
                ], 401);
        }

        $posts = Post::with('user')
            ->get()
            ->map(function ($post) {
               return [
                   'user' => [
                       'name' => $post->user->name
                   ],

                   'id' => $post->id,
                   'title' => $post->title,
                   'description' => $post->description,
                   'targetLink' => route('blog')
               ];
            });

        $products = Product::with('user')
            ->get()
            ->map(function ($product) {
                return [
                    'user' => [
                        'name' => $product->user->name
                    ],

                    'id' => $product->id,
                    'title' => $product->title,
                    'description' => $product->description,
                    'price' => $product->description,
                    'targetLink' => route('shop')
                ];
            });

        return response()
            ->json([
                'data' => compact($products, $posts)
            ]);
    }
}
