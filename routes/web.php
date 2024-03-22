<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::group(['middleware' => 'admin:web'], function () {

    Route::get('/admin', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Routes products
    Route::resource('/admin/product', ProductController::class);
    Route::get('/product/{id}/restore', [App\Http\Controllers\ProductController::class, 'restore'])->name('product.restore');

// Routes user
    Route::resource('/admin/user', UserController::class);

// Routes order
    Route::resource('/admin/order', OrderController::class);
    Route::post('/order/{order}/validate', [App\Http\Controllers\OrderController::class, 'validateOrder'])->name('order.validate');

// Logout
    Route::post('admin/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

});

// Login
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');

Route::post('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);



