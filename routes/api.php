<?php


use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('users/signup', [UserController::class, 'store']);
Route::post('users/login', [UserController::class, 'show']);

Route::post('posts', [PostController::class, 'store']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
Route::put('posts/{id}', [PostController::class, 'update']);
Route::get('posts', [PostController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
