<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserProductController;
use App\Support\CategoryMap;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public storefront
|--------------------------------------------------------------------------
*/

Route::get('/', [UserProductController::class, 'index'])->name('user.home');

// Katalog: /produk/keyboard, /produk/mouse, dst.
Route::get('/produk/{category}', [UserProductController::class, 'category'])
    ->where('category', implode('|', array_keys(CategoryMap::MODELS)))
    ->name('user.category');

// Detail produk: /produk/keyboard/1, /produk/mouse/3, dst.
Route::get('/produk/{category}/{id}', [UserProductController::class, 'show'])
    ->where('category', implode('|', array_keys(CategoryMap::MODELS)))
    ->name('user.product.show');

/*
|--------------------------------------------------------------------------
| Cart & checkout
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{category}/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{key}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/pesanan/{code}', [OrderController::class, 'show'])->name('order.show');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/pesanan', [AdminController::class, 'orders'])->name('orders');
    Route::post('/pesanan/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('order.status');

    foreach (array_keys(CategoryMap::MODELS) as $slug) {
        Route::get("/{$slug}", [AdminController::class, $slug])->name($slug);
        Route::get("/tambah_{$slug}", [AdminController::class, "tambah_{$slug}"])->name("tambah_{$slug}");
        Route::get("/edit_{$slug}/{id}", [AdminController::class, "edit_{$slug}"])->name("edit_{$slug}");
        Route::post("/simpan_{$slug}", [AdminController::class, "simpan_{$slug}"])->name("simpan_{$slug}");
        Route::post("/update_{$slug}/{id}", [AdminController::class, "update_{$slug}"])->name("update_{$slug}");
        Route::post("/hapus_{$slug}/{id}", [AdminController::class, "hapus_{$slug}"])->name("hapus_{$slug}");
    }
});
