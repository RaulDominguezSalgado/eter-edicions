<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/v1/cart/less/{item}', [App\Http\Controllers\ShoppingCartController::class, 'less']);
Route::post('/v1/cart/add/{item}', [App\Http\Controllers\ShoppingCartController::class, 'add']);
Route::post('/v1/cart/add', [App\Http\Controllers\ShoppingCartController::class, 'addProduct']);
Route::get('/v1/cart', [App\Http\Controllers\ShoppingCartController::class, 'viewCart']);
Route::delete('/v1/cart/{item}', [App\Http\Controllers\ShoppingCartController::class, 'destroy']);