<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Total Orders
        $totalOrders = Order::where('user_id', $user->id)->count();

        // Active Cart Total
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();
        $cartTotal = $cart ? $cart->items->sum(fn($item) => $item->product->price * $item->quantity) : 0;

        // Saved Items (Wishlist)
        $savedItemsCount = Wishlist::where('user_id', $user->id)->count();

        // Recent Purchases
        $recentOrders = Order::where('user_id', $user->id)
            ->latest()
            ->take(4)
            ->get();

        return view('dashboard', [
            'totalOrders' => $totalOrders,
            'cartTotal' => $cartTotal,
            'savedItemsCount' => $savedItemsCount,
            'recentOrders' => $recentOrders,
        ]);
    }
}
