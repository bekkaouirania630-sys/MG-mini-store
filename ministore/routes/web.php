<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    // Customer Routes
    Route::post('/order', [\App\Http\Controllers\CustomerController::class, 'storeOrder'])->name('customer.order.store');
    Route::get('/my-orders', [\App\Http\Controllers\CustomerController::class, 'myOrders'])->name('customer.orders');
    Route::delete('/order/{order}', [\App\Http\Controllers\CustomerController::class, 'cancelOrder'])->name('customer.order.cancel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('clients', ClientController::class);
        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::resource('orders', OrderController::class);
    });
    
});

require __DIR__.'/auth.php';
