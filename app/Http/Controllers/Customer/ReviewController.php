<?php

namespace App\Http\Controllers\Customer;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(\Illuminate\Http\Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        $product->reviews()->create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'vendor_id' => $product->vendor_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}
