<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $items = CartItem::with('product.vendor')->where('cart_id', $cart->id)->get();
        $total = $items->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart.index', compact('items', 'total'));
    }

    public function store(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->input('quantity', 1));
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return back()->with('success', 'Product added to cart!');
    }

    public function destroy(CartItem $cartItem)
    {
        // Simple security check: Ensure the item belongs to the user's cart
        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return back()->with('success', 'Item removed from cart');
    }
}
