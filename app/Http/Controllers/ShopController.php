<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('user')
            ->get();

        return view('shop', [
            'products' => $products
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required:int',
            'price' => 'required:int',
            'title' => 'required:string',
            'description' => 'required:string',
            'phone' => 'required:string'
        ]);

        Product::query()
            ->create([
                'user_id' => $request->post('userId'),

                'title' => $request->post('title'),
                'description' => $request->post('description'),
                'contact_phone' => $request->post('phone'),
                'price' => $request->post('price')
            ]);

        return response()
            ->json([
                'success' => true
            ]);
    }

    public function detele(Request $request)
    {
        $this->validate($request, [
            'id' => 'required:int',
        ]);

        Product::query()
            ->where('id', $request->post('id'))
            ->where('user_id', Auth::id())
            ->delete();

        return response()
            ->json([
                'success' => true
            ]);
    }
}
