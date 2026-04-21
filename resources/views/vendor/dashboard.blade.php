@extends('layouts.app')

@section('title', 'Vendor Dashboard - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold tracking-tight mb-2">Vendor <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Panel</span></h1>
            <p class="text-gray-400">Manage your products and orders.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            <div class="glass-card p-8 rounded-3xl bg-gradient-to-br from-orange-600/10 to-transparent border-orange-500/10">
                <p class="text-xs text-orange-400 font-bold uppercase tracking-widest mb-2">My Products</p>
                <p class="text-4xl font-black text-white">{{ $totalProducts }}</p>
            </div>
            <div class="glass-card p-8 rounded-3xl bg-gradient-to-br from-red-600/10 to-transparent border-red-500/10">
                <p class="text-xs text-red-400 font-bold uppercase tracking-widest mb-2">Recent Sales</p>
                <p class="text-4xl font-black text-white">{{ $recentOrders->count() }}</p>
            </div>
        </div>

        <div class="glass-card rounded-[32px] overflow-hidden border-white/5">
            <div class="p-8 border-b border-white/5 flex justify-between items-center text-white">
                <h2 class="text-xl font-bold">Recent Store Activity</h2>
            </div>
            <div class="divide-y divide-white/5">
                @forelse($recentOrders as $item)
                <div class="p-6 flex items-center gap-6">
                    <div class="w-14 h-14 rounded-2xl bg-gray-800 flex items-center justify-center text-2xl">
                        📦
                    </div>
                    <div class="flex-grow">
                        <h4 class="text-white font-bold mb-1">{{ $item->product->name }}</h4>
                        <p class="text-xs text-gray-500">Order #{{ $item->order_id }} • {{ $item->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-white font-mono font-bold">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        <span class="text-[10px] text-gray-500 uppercase font-black">Qty: {{ $item->quantity }}</span>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center text-gray-500 italic">
                    No recent activity in your store.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
