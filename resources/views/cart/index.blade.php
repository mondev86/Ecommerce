@extends('layouts.app')

@section('title', 'Your Cart - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight mb-12">Shopping <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Cart</span></h1>

        @if($items->isEmpty())
            <div class="glass-card rounded-[32px] p-20 text-center">
                <div class="w-24 h-24 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">Your cart is empty</h2>
                <p class="text-gray-400 mb-8 max-w-sm mx-auto">Looks like you haven't added anything to your cart yet. Explore our products and find something unique!</p>
                <a href="/products" class="inline-flex px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-full font-bold transition-all">Start Shopping</a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    @foreach($items as $item)
                        <div class="glass-card rounded-2xl p-6 flex flex-col sm:flex-row items-center gap-6 group relative">
                            <div class="w-24 h-24 rounded-xl bg-gray-800 flex-shrink-0 flex items-center justify-center text-3xl">
                                🛍️
                            </div>
                            <div class="flex-grow text-center sm:text-left">
                                <p class="text-[10px] font-bold text-purple-400 uppercase tracking-widest mb-1">{{ $item->product->vendor->name ?? 'NexShop' }}</p>
                                <h3 class="text-lg font-bold text-white mb-2">{{ $item->product->name }}</h3>
                                <div class="flex items-center justify-center sm:justify-start gap-4">
                                    <span class="text-sm text-gray-400">Qty: {{ $item->quantity }}</span>
                                    <span class="text-lg font-bold font-mono text-white">${{ number_format($item->product->price, 2) }}</span>
                                </div>
                            </div>
                            <div class="flex sm:flex-col items-center gap-4">
                                <form action="/cart/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-3 rounded-xl bg-white/5 text-gray-500 hover:bg-red-500/20 hover:text-red-400 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Summary -->
                <div class="lg:col-span-1">
                    <div class="glass-card rounded-3xl p-8 sticky top-32">
                        <h2 class="text-2xl font-bold mb-8">Order Summary</h2>
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-gray-400">
                                <span>Subtotal</span>
                                <span class="text-white font-mono">${{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-400">
                                <span>Shipping</span>
                                <span class="text-green-400 font-bold uppercase text-xs">Calculated at next step</span>
                            </div>
                            <div class="pt-4 border-t border-white/10 flex justify-between">
                                <span class="text-xl font-bold">Total</span>
                                <span class="text-3xl font-black font-mono text-white">${{ number_format($total, 2) }}</span>
                            </div>
                        </div>
                        <button class="w-full py-4 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white rounded-full font-bold transition-all transform hover:scale-105 shadow-xl shadow-purple-600/20">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
