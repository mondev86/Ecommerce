@extends('layouts.app')

@section('title', 'My Orders - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight mb-2">My <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Orders</span></h1>
                <p class="text-gray-400">Track and manage your recent purchases.</p>
            </div>
            <a href="/products" class="px-6 py-3 bg-white/5 hover:bg-white/10 text-white rounded-full font-bold transition-all border border-white/10 text-sm">Continue Shopping</a>
        </div>

        @if($orders->isEmpty())
            <div class="glass-card rounded-[32px] p-20 text-center">
                <div class="w-20 h-20 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl">
                    📦
                </div>
                <h2 class="text-2xl font-bold mb-4">No orders found</h2>
                <p class="text-gray-400 mb-8 max-w-sm mx-auto">You haven't placed any orders yet. Start exploring our premium collection today!</p>
                <a href="/products" class="inline-flex px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-full font-bold transition-all">Start Shopping</a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="glass-card rounded-3xl p-8 hover:border-purple-500/30 transition-all group overflow-hidden relative">
                    <div class="absolute top-0 right-0 p-8">
                         <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest bg-{{ $order->status === 'delivered' ? 'green' : ($order->status === 'pending' ? 'yellow' : 'blue') }}-500/20 text-{{ $order->status === 'delivered' ? 'green' : ($order->status === 'pending' ? 'yellow' : 'blue') }}-400">
                            {{ $order->status }}
                        </span>
                    </div>
                    <div class="flex flex-col md:flex-row md:items-center gap-8">
                        <div class="flex-grow">
                            <p class="text-xs text-gray-500 font-bold uppercase tracking-widest mb-2">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                            <h3 class="text-xl font-bold text-white mb-1">Placed on {{ $order->created_at->format('M d, Y') }}</h3>
                            <p class="text-gray-400 text-sm">{{ $order->items_count }} items in this order</p>
                        </div>
                        <div class="flex items-center gap-8">
                            <div class="text-right">
                                <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Total Amount</p>
                                <p class="text-3xl font-black font-mono text-white">${{ number_format($order->total_amount, 2) }}</p>
                            </div>
                            <a href="/orders/{{ $order->id }}" class="p-4 rounded-2xl bg-purple-600 hover:bg-purple-700 text-white transition-all transform group-hover:translate-x-1 shadow-lg shadow-purple-600/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
