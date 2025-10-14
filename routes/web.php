<?php

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    dd(Cache::get('all_users'));

    //Cache::add('name', 'Sinisa', '600'); // u kes memoriju dodaj ove vrednosti koje ce da traju 600 sec.

    return view('welcome');
});
Route::view('/products', 'create_product');
Route::post('/products/create', [ProductController::class, 'create']);
