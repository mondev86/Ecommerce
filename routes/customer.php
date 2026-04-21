<?php

// Authenticated User Routes
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\ProfileController as MainProfileController;

Route::group(['middleware' => ['auth']], function () {
    // Cart Management
    Route::get('cart', [CartController::class, 'index']); // View cart
    Route::post('cart/{product}', [CartController::class, 'store']); // Add to cart
    Route::delete('cart/{cartItem}', [CartController::class, 'destroy']); // Remove from cart

    // Wishlist Management
    Route::get('wishlist', [WishlistController::class, 'index']); // View wishlist
    Route::post('wishlist/{wishlist}', [WishlistController::class, 'store']); // Add to wishlist
    Route::delete('wishlist/{wishlist}', [WishlistController::class, 'destroy']); // Remove from wishlist

    // Orders
    Route::get('orders', [OrderController::class, 'index']); // List user orders
    Route::get('orders/{order}', [OrderController::class, 'show']); // View order details
    Route::post('orders', [OrderController::class, 'store']); // Place an order

    // User Profile
    Route::get('profile', [MainProfileController::class, 'edit'])->name('profile.edit'); // Use Breeze profile edit
    Route::patch('profile', [MainProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [MainProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('products/{product}/reviews', [ReviewController::class, 'store']); // Submit a product review
});
