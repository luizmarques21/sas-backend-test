<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('book', [BookController::class, 'index']);
Route::get('book/{id}', [BookController::class, 'show']);
Route::post('book', [BookController::class, 'store']);
Route::put('book/{id}', [BookController::class, 'update']);
Route::delete('book/{id}', [BookController::class, 'destroy']);

Route::get('store', [StoreController::class, 'index']);
Route::get('store/{id}', [StoreController::class, 'show']);
Route::post('store', [StoreController::class, 'store']);
Route::put('store/{id}', [StoreController::class, 'update']);
Route::delete('store/{id}', [StoreController::class, 'destroy']);

Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
