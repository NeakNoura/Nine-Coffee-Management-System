<?php

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

Route::get('/', function () {return view('welcome');});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('products/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('product.contact');
Route::get('products/service', [App\Http\Controllers\Products\ProductsController::class,'service'])->name('product.service');
Route::get('products/menu', [App\Http\Controllers\Products\ProductsController::class, 'menu'])->name('product.menu');
Route::get('products/about', [App\Http\Controllers\Products\ProductsController::class, 'about'])->name('product.about');


Route::get('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('product.single');
Route::post('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'addCart'])->name('add.cart');
Route::get('products/cart', [App\Http\Controllers\Products\ProductsController::class, 'cart'])->name('cart')->middleware("auth:web");
Route::get('products/cart-delete/{id}', [App\Http\Controllers\Products\ProductsController::class, 'deleteProductCart'])->name('cart.product.delete');
Route::post('products/prepare-checkout', [App\Http\Controllers\Products\ProductsController::class, 'prepareCheckout'])->name('prepare.checkout');
Route::get('products/checkout', [App\Http\Controllers\Products\ProductsController::class, 'checkout'])->name('checkout')->middleware('check.for.price');
Route::post('products/checkout', [App\Http\Controllers\Products\ProductsController::class, 'storeCheckout'])->name('proccess.checkout')->middleware('check.for.price');
Route::get('products/paypal', [App\Http\Controllers\Products\ProductsController::class, 'paywithpaypal'])->name('products.paypal')->middleware('check.for.price');
Route::match(['GET', 'POST'], 'products/success', [App\Http\Controllers\Products\ProductsController::class, 'success'])->name('products.success');


Route::post('products/booking', [App\Http\Controllers\Products\ProductsController::class, 'BookingTables'])->name('booking.tables');
Route::get('products/contact', [App\Http\Controllers\Products\ProductsController::class, 'contact'])->name('product.contact');
Route::get('products/menu', [App\Http\Controllers\Products\ProductsController::class, 'menu'])->name('product.menu');
Route::get('products/about', [App\Http\Controllers\Products\ProductsController::class, 'about'])->name('product.about');

Route::get('users/menu', [App\Http\Controllers\Users\UsersController::class, 'displayOrders'])->name('users.orders');
Route::get('users/bookings', [App\Http\Controllers\Users\UsersController::class, 'displayBookings'])->name('users.bookings');


Route::get('users/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'writeReviews'])->name('write.reviews');
Route::post('users/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'proccesswriteReviews'])->name('proccess.write.reviews');