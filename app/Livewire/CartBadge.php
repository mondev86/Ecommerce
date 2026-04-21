<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartBadge extends Component
{
    public int $count = 0;

    protected $listeners = ['cart-updated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            $this->count = $cart ? CartItem::where('cart_id', $cart->id)->sum('quantity') : 0;
        } else {
            $this->count = 0;
        }
    }

    public function render()
    {
        return view('livewire.cart-badge');
    }
}
