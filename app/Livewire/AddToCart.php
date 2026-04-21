<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $this->product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $this->quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
            ]);
        }

        $this->dispatch('cart-updated');
        
        // Simple notification
        $this->dispatch('notify', message: 'Product added to cart!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
