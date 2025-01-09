<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes untuk masing-masing controller
Route::resource('customers', CustomerController::class);
Route::resource('games', GameController::class);
Route::resource('game-images', GameImageController::class);
Route::resource('orders', OrderController::class);
Route::resource('order-details', OrderDetailController::class);