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

Route::get('/', function () {
    return view('dashboard');
});

// Product routes
Route::group([], function () {
    Route::get('/admin/product', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::delete('/admin/product/{product}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/admin/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/admin/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/admin/product', [ProductController::class, 'store'])->name('product.store');
});

//
// Routes

//Route::resources([
//    'admin/product' => ProductController::class,
//]);





