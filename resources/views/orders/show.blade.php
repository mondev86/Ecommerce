@extends('layouts.app')

@section('title', 'Order Details - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-8">
            <a href="/orders" class="p-2 rounded-xl bg-white/5 text-gray-400 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-2xl font-bold">Order Details</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Order Items -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass-card rounded-[32px] overflow-hidden border-white/5">
                    <div class="p-8 border-b border-white/5 bg-white/3 flex justify-between items-center">
                        <div>
                            <p class="text-xs text-purple-400 font-bold uppercase tracking-widest mb-1">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                            <p class="text-white font-bold">{{ $order->created_at->format('F d, Y \a\t H:i') }}</p>
                        </div>
                        <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest bg-{{ $order->status === 'delivered' ? 'green' : ($order->status === 'pending' ? 'yellow' : 'blue') }}-500/20 text-{{ $order->status === 'delivered' ? 'green' : ($order->status === 'pending' ? 'yellow' : 'blue') }}-400">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div class="divide-y divide-white/5">
                        @foreach($order->items as $item)
                        <div class="p-8 flex items-center gap-8 group">
                            <div class="w-20 h-20 rounded-2xl bg-gray-800 flex items-center justify-center text-3xl group-hover:scale-105 transition-transform">
                                🛍️
                            </div>
                            <div class="flex-grow">
                                <p class="text-[10px] font-bold text-purple-400 uppercase tracking-widest mb-1">{{ $item->product->vendor->name ?? 'NexShop' }}</p>
                                <h3 class="text-lg font-bold text-white mb-2">{{ $item->product->name }}</h3>
                                <div class="flex items-center gap-4 text-sm text-gray-500">
                                    <span>Quantity: {{ $item->quantity }}</span>
                                    <span>•</span>
                                    <span>Price: ${{ number_format($item->price, 2) }}</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xl font-black font-mono text-white">${{ number_format($item->price * $item->quantity, 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="glass-card rounded-[32px] p-8 space-y-6">
                    <h2 class="text-xl font-bold mb-6">Summary</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between text-gray-400">
                            <span>Subtotal</span>
                            <span class="text-white font-mono">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>Tax</span>
                            <span class="text-white font-mono">$0.00</span>
                        </div>
                        <div class="flex justify-between text-gray-400 border-t border-white/5 pt-4">
                            <span class="text-lg font-bold text-white">Total</span>
                            <span class="text-2xl font-black font-mono text-white">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="pt-8 border-t border-white/5">
                        <div class="p-6 rounded-2xl bg-purple-600/10 border border-purple-500/20">
                            <p class="text-xs text-purple-400 font-bold uppercase tracking-widest mb-2">Shipping Address</p>
                            <p class="text-white text-sm">Default Address on File</p>
                        </div>
                    </div>

                    <button class="w-full py-4 bg-white/5 hover:bg-white/10 text-white rounded-full font-bold transition-all border border-white/10 text-sm">Download Invoice (PDF)</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
