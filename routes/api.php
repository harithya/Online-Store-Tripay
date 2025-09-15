<?php

use App\Http\Controllers\Front\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('checkout/callback', [CheckoutController::class, 'callback'])->middleware('tripay.verify');
