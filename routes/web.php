<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();

    return redirect('/');
})->name('logout');

// Blog routes.
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog');

Route::group(['middleware' => ['auth']], function () {

    // Chat routes.
    Route::get('/chats', [ChatController::class, 'index'])
        ->name('chats');

    Route::get('/chats/{uuid}', [ChatController::class, 'show'])
        ->name('chat');

    Route::post('/chats', [ChatController::class, 'storeMessage'])
        ->name('store-chat');

    Route::get('/chats-create/{userId}', [ChatController::class, 'createChat'])
        ->name('create-chat');

    Route::get('/unseen-chats', [ChatController::class, 'getUnseenMessages'])
        ->name('unseen-chats');

    // Blog routes.
    Route::post('/blog', [BlogController::class, 'store'])
        ->name('blog-store');

    // Blog routes.
    Route::delete('/blog', [BlogController::class, 'delete'])
        ->name('blog-delete');

    // Shop routes.
    Route::get('/shop', [ShopController::class, 'index'])
        ->name('shop');

    Route::delete('/shop', [ShopController::class, 'detele'])
        ->name('shop-delete');

    Route::post('/shop', [ShopController::class, 'create'])
        ->name('shop-store');
});

Route::post('/api/details/', [Controller::class, 'details'])
    ->name('shop-store');

