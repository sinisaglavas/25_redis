<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('profile.changeAvatar');
});

// posle auth instalacije ove rute su nestale - vracanje preko local history
Route::get('/', [HomeController::class, 'index']);
Route::view('/products', 'create_product');
Route::post('/products/create', [ProductController::class, 'create']);
Route::get('/products/flush', [ProductController::class, 'flush']);


require __DIR__.'/auth.php';
