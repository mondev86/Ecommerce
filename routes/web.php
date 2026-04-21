<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\ProductCategory;

Route::get('/', function () {
    $products = Product::with(['vendor', 'productStatus'])->inRandomOrder()->take(8)->get();
    $categories = ProductCategory::take(6)->get();
    $vendors = Vendor::with('user')->inRandomOrder()->take(4)->get();
    
    return view('welcome', compact('products', 'categories', 'vendors'));
});

Route::get('/dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/public.php';
require __DIR__ . '/customer.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
