<?php

namespace App\Http\Controllers\Public;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('vendor')->paginate(12);
        return view('products', compact('products'));
    }

    public function show(Product $product) {}
}
