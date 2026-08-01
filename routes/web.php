<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/catalogue', [FrontendController::class, 'catalogue'])->name('catalogue');
Route::get('/product/{slug}', [FrontendController::class, 'product'])->name('product');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $stats = [
            'orders' => \App\Models\Order::count(),
            'products' => \App\Models\Product::count(),
            'collections' => \App\Models\Collection::count(),
        ];
        return view('dashboard', compact('stats'));
    })->name('dashboard');

    Route::resource('collections', CollectionController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
