<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

// Custom Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'showContactInfo'])->name('contacts');
Route::get('/products', [ProductController::class, 'showProductList'])->name('products');
Route::get('/product/{product_id}', [ProductController::class, 'showProductDetailInfo']);
Route::get('/cart', [CartController::class, 'showCart'])->name('cart')->middleware(['auth']);
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cartUpdate');
Route::get('/order', [OrderController::class, 'showOrder'])->name('order')->middleware(['auth']);
Route::post('/order/make', [OrderController::class, 'orderMake'])->name('orderMake');
Route::post('/order/delete', [OrderController::class, 'orderDelete'])->name('orderDelete');
Route::post('/order/confirm', [OrderController::class, 'orderConfirm'])->name('orderConfirm');

Route::get('/auth', function () {
   return view('auth');
})->name('auth');

// Breeze Routes
Route::get('/welcome', function () { // TODO
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
