<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::with('user')
            ->get();

        return view('blogs', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required:int',
            'title' => 'required:string',
            'description' => 'required:string'
        ]);

        Post::query()
            ->create([
                'user_id' => $request->post('userId'),

                'title' => $request->post('title'),
                'description' => $request->post('description')
            ]);

        return response()
            ->json([
               'success' => true
            ]);
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required:int',
        ]);

        Post::query()
            ->where('id', $request->post('id'))
            ->where('user_id', Auth::id())
            ->delete();

        return response()
            ->json([
                'success' => true
            ]);
    }
}
