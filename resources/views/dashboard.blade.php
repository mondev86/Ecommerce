@extends('layouts.app')

@section('title', 'Your Dashboard - NexShop')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1 space-y-4">
                <div class="glass-card rounded-3xl p-6 mb-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center font-bold text-xl uppercase">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-white font-bold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <nav class="space-y-1">
                        <a href="/dashboard" class="flex items-center gap-3 p-3 rounded-xl bg-purple-600/20 text-purple-400 font-bold text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Overview
                        </a>
                        <a href="/orders" class="flex items-center gap-3 p-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            My Orders
                        </a>
                        <a href="/wishlist" class="flex items-center gap-3 p-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            Wishlist
                        </a>
                        <a href="/profile" class="flex items-center gap-3 p-3 rounded-xl text-gray-400 hover:bg-white/5 hover:text-white transition text-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Settings
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Dashboard Content -->
            <div class="lg:col-span-3">
                <div class="mb-10">
                    <h1 class="text-4xl font-extrabold tracking-tight mb-2">Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">{{ explode(' ', Auth::user()->name)[0] }}</span></h1>
                    <p class="text-gray-400">Here's what's happening with your account today.</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="glass-card p-8 rounded-3xl bg-gradient-to-br from-purple-600/10 to-transparent border-purple-500/10">
                        <p class="text-xs text-purple-400 font-bold uppercase tracking-widest mb-2">Total Orders</p>
                        <p class="text-4xl font-black text-white">{{ $totalOrders }}</p>
                    </div>
                    <div class="glass-card p-8 rounded-3xl bg-gradient-to-br from-blue-600/10 to-transparent border-blue-500/10">
                        <p class="text-xs text-blue-400 font-bold uppercase tracking-widest mb-2">Active Cart</p>
                        <p class="text-4xl font-black text-white">${{ number_format($cartTotal, 2) }}</p>
                    </div>
                    <div class="glass-card p-8 rounded-3xl bg-gradient-to-br from-green-600/10 to-transparent border-green-500/10">
                        <p class="text-xs text-green-400 font-bold uppercase tracking-widest mb-2">Saved Items</p>
                        <p class="text-4xl font-black text-white">{{ $savedItemsCount }}</p>
                    </div>
                </div>

                <!-- Recent Activity Mockup -->
                <div class="glass-card rounded-[32px] overflow-hidden border-white/5">
                    <div class="p-8 border-b border-white/5 flex justify-between items-center text-white">
                        <h2 class="text-xl font-bold">Recent Purchases</h2>
                        <a href="#" class="text-xs font-bold text-purple-400 hover:text-white transition uppercase tracking-widest">View History</a>
                    </div>
                    <div class="divide-y divide-white/5">
                        @forelse($recentOrders as $order)
                        <div class="p-6 flex items-center gap-6 hover:bg-white/3 transition group cursor-pointer" onclick="window.location='/orders/{{ $order->id }}'">
                            <div class="w-14 h-14 rounded-2xl bg-gray-800 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                📦
                            </div>
                            <div class="flex-grow">
                                <h4 class="text-white font-bold mb-1">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h4>
                                <p class="text-xs text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-white font-mono font-bold">${{ number_format($order->total_amount, 2) }}</p>
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-{{ str_contains(strtolower($order->status->name), 'delivered') ? 'green' : (str_contains(strtolower($order->status->name), 'pending') ? 'yellow' : 'blue') }}-500/20 text-{{ str_contains(strtolower($order->status->name), 'delivered') ? 'green' : (str_contains(strtolower($order->status->name), 'pending') ? 'yellow' : 'blue') }}-400 font-bold uppercase">{{ $order->status->name }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="p-12 text-center">
                            <p class="text-gray-500 text-sm italic">No recent purchases found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
