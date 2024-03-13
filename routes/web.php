<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ajouter middleware auth pour le rôle admin voir un autre role pour la gestion des articles.

Route::get('/admin/', function () {
    return view('dashboard');
});

// Product routes
Route::resource('/admin/product', ProductController::class);

// User routes
Route::resource('/admin/user', App\Http\Controllers\UserController::class);




