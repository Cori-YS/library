<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/', [MainController::class, 'show'])->name('index');
    Route::get('/cart', [MainController::class, 'cart'])->name('cart');
    Route::get('/checkout', [MainController::class, 'finalize'])->name('checkout');
    Route::get('/checkout-over', [MainController::class, 'finalize_over'])->name('checkout.over');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::get('/detail/{id}', [MainController::class, 'detail'])->name('detail');
    Route::get('/shop', [MainController::class, 'shops'])->name('shop');    
    Route::post('/shop', [MainController::class, 'search'])->name('shop.search');    
    Route::get('/remove-from-cart/{id}', [MainController::class, 'remove_from_cart'])->name('cart.remove');    
    Route::get('/add-to-cart/{id}', [MainController::class, 'add_to_cart'])->name('cart.add');    
});

require __DIR__.'/auth.php';
