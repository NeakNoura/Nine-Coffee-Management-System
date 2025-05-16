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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('products/contact', [App\Http\Controllers\Products\ProductsController::class, 'contact'])->name('product.contact');
Route::get('products/service', [App\Http\Controllers\Products\ProductsController::class,'service'])->name('product.service');
Route::get('products/menu', [App\Http\Controllers\Products\ProductsController::class, 'menu'])->name('product.menu');
Route::get('products/about', [App\Http\Controllers\Products\ProductsController::class, 'about'])->name('product.about');


Route::get('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'singleProduct'])->name('product.single');
Route::post('products/product-single/{id}', [App\Http\Controllers\Products\ProductsController::class, 'addCart'])->name('add.cart');
Route::get('products/cart', [App\Http\Controllers\Products\ProductsController::class, 'cart'])->name('cart')->middleware('auth:web');
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

Route::get('users/menu', [App\Http\Controllers\Users\UsersController::class, 'displayOrders'])->name('users.orders')->middleware('auth:web');
Route::get('users/bookings', [App\Http\Controllers\Users\UsersController::class, 'displayBookings'])->name('users.bookings')->middleware('auth:web');


Route::get('users/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'writeReviews'])->name('write.reviews')->middleware('auth:web');
Route::post('users/write-reviews', [App\Http\Controllers\Users\UsersController::class, 'proccesswriteReviews'])->name('proccess.write.reviews')->middleware('auth:web');


Route::get('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');


Route::get('admin/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'DisplayAllAdmins'])->name('all.admins');
Route::get('admin/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admins');

Route::group(['prefix' => 'users', 'middleware' => 'auth:admin'], function(){
Route::get('admin/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

});

Route::get('admin/all-orders', [App\Http\Controllers\Admins\AdminsController::class, 'DisplayAllOrders'])->name('all.orders');
Route::get('admin/edit-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'EditOrders'])->name('edit.orders');
Route::post('admin/edit-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'UpdateOrders'])->name('update.orders');
Route::delete('admin/delete-orders/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'DeleteOrders'])->name('delete.orders');





Route::get('all/products', [App\Http\Controllers\Admins\AdminsController::class, 'DisplayProducts'])->name('all.products');
Route::get('/create-products', [App\Http\Controllers\Admins\AdminsController::class, 'CreateProducts'])->name('create.products');
Route::post('/store-products', [App\Http\Controllers\Admins\AdminsController::class, 'StoreProducts'])->name('store.products');
Route::get('/delete-products/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'DeleteProducts'])->name('delete.products');


Route::match(['GET', 'POST'],'/all-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'DisplayBookings'])->name('all.bookings');
Route::get('/edit-bookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'EditBookings'])->name('edit.bookings');
Route::post('/update-bookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'UpdateBookings'])->name('update.bookings');
Route::get('/delete-bookings/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'DeleteBookings'])->name('delete.bookings');
Route::get('/create-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'CreateBookings'])->name('create.bookings');
Route::post('/store-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'StoreBookings'])->name('store.bookings');
Route::get('/help', [App\Http\Controllers\Admins\AdminsController::class, 'Help'])->name('admins.help');