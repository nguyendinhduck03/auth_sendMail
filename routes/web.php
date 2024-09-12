<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\OrderController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Clients\AuthController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\PaymentController;
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

Route::prefix('/')->group(function () {
    Route::get('login_form', [AuthController::class, 'loginForm'])->name('login-form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register_form', [AuthController::class, 'registerForm'])->name('register-form');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('', [HomeController::class, 'home'])->name('home');
    Route::get('detail_product/{id}', [HomeController::class, 'detailProduct'])->name('detail-product');
    Route::get('products', [HomeController::class, 'products'])->name('products');
    Route::post('add_to_cart/{id}', [HomeController::class, 'addToCart'])->name('add-to-cart');

    Route::get('cart', [PaymentController::class, 'cart'])->name('cart')->middleware('checkLogin');
    Route::get('change_cart', [PaymentController::class, 'changeCart'])->name('change-cart');
    Route::get('remove_cart/{id}', [PaymentController::class, 'removeCart'])->name('remove-cart');
    Route::post('order_confirmation', [PaymentController::class, 'orderConfirmation'])->name('order-confirmation')->middleware('checkLogin');
    Route::post('create_order', [PaymentController::class, 'createOrder'])->name('create-order');
    Route::get('thank_you', [PaymentController::class, 'thankYou'])->name('thank-you')->middleware('checkLogin');
    Route::get('order_processing/{id}', [PaymentController::class, 'orderProcessing'])->name('order-processing');

}); 
 
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders-completed', [OrderController::class, 'completed'])->name('orders.completed');
    Route::get('orders-canceled', [OrderController::class, 'canceled'])->name('orders.canceled');
    Route::get('orders-detail/{id}', [OrderController::class, 'orderDetail'])->name('orders.detail');
    Route::get('orders-confirm/{id}', [OrderController::class, 'orderConfirm'])->name('orders.confirm');
    Route::get('orders-cancel/{id}', [OrderController::class, 'orderCancel'])->name('orders.cancel');
});