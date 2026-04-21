<?php

namespace App\Http\Controllers\Customer;

use App\Models\Wishlist;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())
            ->with('product.vendor')
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlistItems'));
    }

    public function store(Request $request, Product $product)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        return back()->with('success', 'Product added to wishlist!');
    }

    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->user_id !== Auth::id()) {
            abort(403);
        }

        $wishlist->delete();

        return back()->with('success', 'Product removed from wishlist');
    }
}
