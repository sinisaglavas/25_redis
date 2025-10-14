<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::view('/products', 'create_product');
Route::post('/products/create', [ProductController::class, 'create']);
Route::get('/products/flush', [ProductController::class, 'flush']);
