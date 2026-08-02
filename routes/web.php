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
Route::get('/googlefe4cf07cb99ee2c2.html', function () {
    return response('google-site-verification: googlefe4cf07cb99ee2c2.html', 200)
        ->header('Content-Type', 'text/html');
});

Route::get('/sitemap.xml', function () {
    $products = \App\Models\Product::all();
    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $content .= '<url><loc>' . route('home') . '</loc><changefreq>daily</changefreq><priority>1.0</priority></url>';
    $content .= '<url><loc>' . route('catalogue') . '</loc><changefreq>daily</changefreq><priority>0.9</priority></url>';
    $content .= '<url><loc>' . route('contact') . '</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>';
    foreach ($products as $product) {
        $content .= '<url><loc>' . route('product', $product->slug) . '</loc><lastmod>' . ($product->updated_at ? $product->updated_at->toAtomString() : date('c')) . '</lastmod><changefreq>weekly</changefreq><priority>0.8</priority></url>';
    }
    $content .= '</urlset>';
    return response($content, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');

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
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'update', 'destroy']);
    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class)->except(['create', 'edit', 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
