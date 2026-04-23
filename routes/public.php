<?php

// Public Routes
use App\Http\Controllers\Public\VendorController;
use App\Http\Controllers\Public\ReviewController;
use App\Http\Controllers\Public\ProductController;
use App\Http\Controllers\Public\ProductCategoryController;

// Product Browsing
Route::get('products', [ProductController::class, 'index']); // List all products
Route::get('products/{product}', [ProductController::class, 'show']); // Show product details

// Categories
Route::get('product-categories', [ProductCategoryController::class, 'index'])->name('product-categories.index');
Route::get('product-categories/{category}', [ProductCategoryController::class, 'show'])->name('product-categories.show');

// Vendor Information
Route::get('vendors', [VendorController::class, 'index'])->name('vendors.index');
Route::get('vendors/{vendor}', [VendorController::class, 'show'])->name('vendors.show');

// Reviews
Route::get('products/{product}/reviews', [ReviewController::class, 'index']); // List product reviews

// Static Pages
Route::view('affiliate', 'pages.affiliate')->name('pages.affiliate');
Route::view('privacy-policy', 'pages.privacy')->name('pages.privacy');
Route::view('terms-of-service', 'pages.terms')->name('pages.terms');
