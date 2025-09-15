<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('product/{slug}', [HomeController::class, 'show'])->name('home.show');

Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy'])->names('cart');
Route::middleware('auth')->group(function () {
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::resource('transaction', TransactionController::class)->only(['index', 'show'])->names('transaction');
});

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, "index"])->name('auth.login.index');
    Route::post('login', [LoginController::class, "store"])->name('auth.login.store');

    Route::get('register', [RegisterController::class, "index"])->name('auth.register.index');
    Route::post('register', [RegisterController::class, "store"])->name('auth.register.store');
});
Route::post('auth/logout', [LoginController::class, "logout"])->name('auth.logout');


Route::prefix('admin')->middleware(['auth', 'auth.is_admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('product', ProductController::class)->names('admin.product');
    Route::resource('invoice', InvoiceController::class)->only(['index', 'show'])->names('admin.invoice');
});
