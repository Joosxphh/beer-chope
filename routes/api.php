<?php

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

Route::get("/product", "App\Http\Controllers\Api\ProductController@index")->name("product.index");
Route::get("/product/{product}", "App\Http\Controllers\Api\ProductController@show")->name("product.show");

Route::post("/login", "App\Http\Controllers\Api\AuthController@login")->name("login");

Route::middleware('auth:sanctum')->get('/user', 'App\Http\Controllers\Api\AuthController@getUser');

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/cart", "App\Http\Controllers\Api\CartController@show")->name("cart.show");
    Route::post("/cart/item", "App\Http\Controllers\Api\CartController@add")->name("cart.add");
    Route::post("/cart/complete", "App\Http\Controllers\Api\CartController@complete")->name("cart.complete");
    Route::delete("/cart/delete/{orderItem}", "App\Http\Controllers\Api\CartController@delete")->name("cart.delete");
});
