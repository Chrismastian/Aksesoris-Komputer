<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProductController;

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

Route::get('/', [UserProductController::class, 'index'])->name('user.home');

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/keyboard', [AdminController::class, 'keyboard']);
Route::get('/admin/tambah_keyboard', [AdminController::class, 'tambah_keyboard']);
Route::get('/admin/edit_keyboard/{id}', [AdminController::class, 'edit_keyboard']);
Route::post('/admin/update_keyboard/{id}', [AdminController::class, 'update_keyboard']);
Route::post('/admin/hapus_keyboard/{id}', [AdminController::class, 'hapus_keyboard']);
Route::post('/admin/simpan_keyboard', [AdminController::class, 'simpan_keyboard']);

Route::get('/admin/mouse', [AdminController::class, 'mouse']);
Route::get('/admin/tambah_mouse', [AdminController::class, 'tambah_mouse']);
Route::get('/admin/edit_mouse/{id}', [AdminController::class, 'edit_mouse']);
Route::post('/admin/update_mouse/{id}', [AdminController::class, 'update_mouse']);
Route::post('/admin/hapus_mouse/{id}', [AdminController::class, 'hapus_mouse']);
Route::post('/admin/simpan_mouse', [AdminController::class, 'simpan_mouse']);

Route::get('/admin/headset', [AdminController::class, 'headset']);
Route::get('/admin/tambah_headset', [AdminController::class, 'tambah_headset']);
Route::get('/admin/edit_headset/{id}', [AdminController::class, 'edit_headset']);
Route::post('/admin/update_headset/{id}', [AdminController::class, 'update_headset']);
Route::post('/admin/hapus_headset/{id}', [AdminController::class, 'hapus_headset']);
Route::post('/admin/simpan_headset', [AdminController::class, 'simpan_headset']);

Route::get('/admin/monitor', [AdminController::class, 'monitor']);
Route::get('/admin/tambah_monitor', [AdminController::class, 'tambah_monitor']);
Route::get('/admin/edit_monitor/{id}', [AdminController::class, 'edit_monitor']);
Route::post('/admin/update_monitor/{id}', [AdminController::class, 'update_monitor']);
Route::post('/admin/hapus_monitor/{id}', [AdminController::class, 'hapus_monitor']);
Route::post('/admin/simpan_monitor', [AdminController::class, 'simpan_monitor']);

Route::get('/admin/storage', [AdminController::class, 'storage']);
Route::get('/admin/tambah_storage', [AdminController::class, 'tambah_storage']);
Route::get('/admin/edit_storage/{id}', [AdminController::class, 'edit_storage']);
Route::post('/admin/update_storage/{id}', [AdminController::class, 'update_storage']);
Route::post('/admin/hapus_storage/{id}', [AdminController::class, 'hapus_storage']);
Route::post('/admin/simpan_storage', [AdminController::class, 'simpan_storage']);




// Homepage user
Route::get('/', [UserProductController::class, 'index'])->name('user.home');

// Katalog per kategori
Route::get('/produk/keyboard', [UserProductController::class, 'keyboard'])->name('user.keyboard');
Route::get('/produk/mouse',    [UserProductController::class, 'mouse'])->name('user.mouse');
Route::get('/produk/headset',  [UserProductController::class, 'headset'])->name('user.headset');
Route::get('/produk/monitor',  [UserProductController::class, 'monitor'])->name('user.monitor');
Route::get('/produk/storage',  [UserProductController::class, 'storage'])->name('user.storage');

// Detail produk: /produk/keyboard/1, /produk/mouse/3, dst.
Route::get('/produk/{category}/{id}', [UserProductController::class, 'show'])
    ->where('category', 'keyboard|mouse|headset|monitor|storage')
    ->name('user.product.show');
// Cart routes
use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{key}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
