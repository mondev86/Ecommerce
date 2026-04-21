<?php

namespace App\Http\Controllers\Public;

use App\Models\ProductCategory;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::withCount('products')->get();
        return view('categories.index', compact('categories'));
    }

    public function show(ProductCategory $category)
    {
        $products = Product::where('product_category_id', $category->id)->with('vendor')->paginate(12);
        return view('categories.show', compact('category', 'products'));
    }
}
