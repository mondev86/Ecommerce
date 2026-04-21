<?php

namespace App\Http\Controllers\Public;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['vendor', 'productStatus'])->paginate(12);
        return view('products', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['vendor', 'category', 'productStatus']);
        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
