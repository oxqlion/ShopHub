<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/create', [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/product/create', [ProductController::class, 'storeProduct'])->name('storeProduct');
Route::get('/products', [ProductController::class, 'indexProduct'])->name('indexProduct');
Route::get('/product/{product}', [ProductController::class, 'showProduct'])->name('detailProduct');
Route::get('/product/{product}/edit', [ProductController::class, 'editProduct'])->name('editProduct');
Route::patch('/product/{product}/update', [ProductController::class, 'updateProduct'])->name('updateProduct');
Route::delete('/product/{product}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');
Route::patch('/cart/{cart}', [CartController::class, 'updateCart'])->name('updateCart');
Route::delete('/cart/{cart}', [CartController::class, 'deleteCart'])->name('deleteCart');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'indexOrder'])->name('indexOrder');
Route::get('/orders/{order}', [OrderController::class, 'showOrder'])->name('showOrder');
Route::post('/order/{order}/pay', [OrderController::class, 'submitPaymentReceipt'])->name('submitPaymentReceipt');
Route::post('/order/{order}/confirm', [OrderController::class, 'confirmPayment'])->name('confirmPayment');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::post('profle', [ProfileController::class, 'editProfile'])->name('editProfile');