<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->withCount('items')
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::user()->id) {
            abort(403);
        }

        $order->load(['items.product.vendor']);

        return view('orders.show', compact('order'));
    }

    public function store()
    {
        // logic for placing an order from cart
    }
}
