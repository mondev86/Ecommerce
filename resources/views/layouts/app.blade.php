<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'NexShop - Premium Multi-Vendor Marketplace')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #0f1115;
            color: #ffffff;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-5px);
            border-color: rgba(139, 92, 246, 0.5);
        }
        .neon-text-glow {
            text-shadow: 0 0 20px rgba(139, 92, 246, 0.6);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #0f1115;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #2d2f36;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #4a4d5a;
        }
    </style>
    @yield('styles')
    @livewireStyles
</head>
<body class="antialiased overflow-x-hidden custom-scrollbar">

    <!-- Navbar Trigger Zone & Indicator -->
    <div class="fixed top-0 left-0 w-full h-8 z-[60] peer group flex justify-center items-start pt-1.5 cursor-ns-resize">
        <div class="w-16 h-1 bg-white/20 rounded-full group-hover:bg-purple-500 transition-all duration-300 shadow-[0_0_10px_rgba(139,92,246,0)] group-hover:shadow-[0_0_10px_rgba(139,92,246,0.8)]"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-500 -translate-y-full peer-hover:translate-y-0 hover:translate-y-0" style="background: rgba(15, 17, 21, 0.8); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.05);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="/" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-white">Nex<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-400">Shop</span></span>
                </a>
                
                <div class="hidden md:flex space-x-8 ml-12">
                    <a href="/products" class="text-gray-300 hover:text-white font-medium transition">Discover</a>
                    <a href="{{ route('vendors.index') }}" class="text-gray-300 hover:text-white font-medium transition">Vendors</a>
                    <a href="/product-categories" class="text-gray-300 hover:text-white font-medium transition">Categories</a>
                </div>

                <!-- Real-time Search -->
                <div class="flex-grow flex justify-center px-8">
                    @livewire('product-search')
                </div>

                <div class="flex items-center space-x-4">
                    @livewire('cart-badge')
                    
                    @guest
                        <a href="{{ route('login') }}" class="hidden md:inline-flex items-center justify-center px-6 py-2 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-white/10 hover:bg-white/20 transition ml-4 backdrop-blur-sm">
                            Sign In
                        </a>
                    @else
                        <div class="flex items-center gap-4 ml-4">
                            <div class="flex flex-col items-end">
                                <a href="/dashboard" class="group flex flex-col items-end">
                                    <span class="text-xs text-gray-400 font-medium whitespace-nowrap group-hover:text-white transition-colors">Hi, {{ Auth::user()->name }}</span>
                                    @if(Auth::user()->hasRole(['admin', 'super admin']))
                                        <span class="text-[9px] text-purple-400 font-bold uppercase tracking-wider group-hover:text-purple-300 transition-colors">Admin Panel</span>
                                    @elseif(Auth::user()->hasRole(['vendor', 'vendor manager']))
                                        <span class="text-[9px] text-orange-400 font-bold uppercase tracking-wider group-hover:text-orange-300 transition-colors">Vendor Dashboard</span>
                                    @else
                                        <span class="text-[9px] text-blue-400 font-bold uppercase tracking-wider group-hover:text-blue-300 transition-colors">Customer Dashboard</span>
                                    @endif
                                </a>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="p-2 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black py-20 border-t border-white/5 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <a href="/" class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-white">NexShop</span>
                    </a>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        The world's leading multi-vendor marketplace for premium digital and physical goods.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://twitter.com/nexshop" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-purple-600 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="https://instagram.com/nexshop" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-purple-600 hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-6 italic tracking-wider">Marketplace</h3>
                    <ul class="space-y-4">
                        <li><a href="/products" class="text-gray-400 hover:text-purple-400 transition-colors">Discover</a></li>
                        <li><a href="{{ route('vendors.index') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Vendors</a></li>
                        <li><a href="/product-categories" class="text-gray-400 hover:text-purple-400 transition-colors">Categories</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-6 italic tracking-wider">Account</h3>
                    <ul class="space-y-4">
                        <li><a href="/dashboard" class="text-gray-400 hover:text-purple-400 transition-colors">User Dashboard</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Sign In</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Register</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-6 italic tracking-wider">Join Us</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Become a Vendor</a></li>
                        <li><a href="{{ route('pages.affiliate') }}" class="text-gray-400 hover:text-purple-400 transition-colors">Affiliate Program</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-gray-500 text-sm">© 2026 NexShop Marketplace. All rights reserved.</p>
                <div class="flex gap-8">
                    <a href="{{ route('pages.privacy') }}" class="text-gray-500 hover:text-white text-xs transition-colors">Privacy Policy</a>
                    <a href="{{ route('pages.terms') }}" class="text-gray-500 hover:text-white text-xs transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Notifications -->
    <div id="notification-container" class="fixed bottom-32 right-6 z-[100]...">

    @yield('scripts')
    @livewireScripts
    <script>
        window.addEventListener('notify', event => {
            const container = document.getElementById('notification-container');
            const notification = document.createElement('div');
            notification.className = 'glass-card px-6 py-4 rounded-2xl shadow-2xl border-purple-500/30 flex items-center gap-3 animate-slide-in pointer-events-auto';
            notification.innerHTML = `
                <div class="w-8 h-8 rounded-full bg-purple-600 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="font-bold text-white text-sm">${event.detail.message}</span>
            `;
            container.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.add('animate-slide-out');
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        });
    </script>
    <style>
        @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-out {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .animate-slide-in { animation: slide-in 0.5s ease-out forwards; }
        .animate-slide-out { animation: slide-out 0.5s ease-in forwards; }
    </style>

   <!-- NexBot Widget -->
<style>
    #nexbot-window {
        background: rgba(10, 11, 15, 0.97);
        border: 1px solid rgba(139, 92, 246, 0.25);
        box-shadow: 0 25px 60px rgba(0,0,0,0.6), 0 0 40px rgba(139,92,246,0.08);
        transform-origin: bottom right;
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), opacity 0.25s ease;
    }
    #nexbot-window.nex-hidden {
        transform: scale(0.85) translateY(10px);
        opacity: 0;
        pointer-events: none;
    }
    #nexbot-window.nex-visible {
        transform: scale(1) translateY(0);
        opacity: 1;
        pointer-events: all;
    }
    .nex-toggle-btn {
        background: linear-gradient(135deg, #7c3aed, #3b82f6);
        box-shadow: 0 8px 32px rgba(124,58,237,0.5);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .nex-toggle-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #9333ea, #60a5fa);
        opacity: 0;
        transition: opacity 0.2s ease;
    }
    .nex-toggle-btn:hover { transform: scale(1.1); box-shadow: 0 12px 40px rgba(124,58,237,0.7); }
    .nex-toggle-btn:hover::before { opacity: 1; }
    .nex-toggle-btn svg { position: relative; z-index: 1; }
    .nex-pulse {
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid rgba(139,92,246,0.4);
        animation: nexPulse 2.5s ease-out infinite;
    }
    @keyframes nexPulse {
        0%   { transform: scale(1); opacity: 0.6; }
        100% { transform: scale(1.5); opacity: 0; }
    }
    .nex-msg-bot, .nex-msg-user { animation: nexMsgIn 0.3s cubic-bezier(0.34,1.3,0.64,1); }
    @keyframes nexMsgIn {
        from { transform: translateY(8px) scale(0.97); opacity: 0; }
        to   { transform: translateY(0) scale(1); opacity: 1; }
    }
    .nex-typing span {
        display: inline-block;
        width: 6px; height: 6px;
        background: rgba(139,92,246,0.7);
        border-radius: 50%;
        animation: nexDot 1.2s ease-in-out infinite;
    }
    .nex-typing span:nth-child(2) { animation-delay: 0.2s; }
    .nex-typing span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes nexDot {
        0%,80%,100% { transform: scale(0.7); opacity: 0.4; }
        40%          { transform: scale(1.1); opacity: 1; }
    }
    .nex-input:focus { border-color: rgba(139,92,246,0.6) !important; box-shadow: 0 0 0 3px rgba(139,92,246,0.1); }
    .nex-send-btn {
        background: linear-gradient(135deg, #7c3aed, #3b82f6);
        transition: transform 0.15s ease, opacity 0.15s ease;
    }
    .nex-send-btn:hover { transform: scale(1.05); opacity: 0.9; }
    .nex-send-btn:active { transform: scale(0.95); }
    #nexbot-messages::-webkit-scrollbar { width: 4px; }
    #nexbot-messages::-webkit-scrollbar-track { background: transparent; }
    #nexbot-messages::-webkit-scrollbar-thumb { background: rgba(139,92,246,0.3); border-radius: 4px; }

    @keyframes nexShake {
    0%,100% { transform: translateX(0); }
    15%      { transform: translateX(-4px) rotate(-2deg); }
    30%      { transform: translateX(4px) rotate(2deg); }
    45%      { transform: translateX(-3px) rotate(-1deg); }
    60%      { transform: translateX(3px) rotate(1deg); }
    75%      { transform: translateX(-2px); }
    90%      { transform: translateX(2px); }
}

.nex-toggle-btn {
    animation: nexShake 3s ease-in-out infinite;
}

.nex-toggle-btn:hover {
    animation: none;
    transform: scale(1.1);
}
</style>

<div id="nexbot" style="position:fixed; bottom:24px; right:24px; z-index:200; display:flex; flex-direction:column; align-items:flex-end; gap:12px;">

    <!-- Chat Window -->
    <div id="nexbot-window" class="nex-hidden" style="width:360px; height:520px; border-radius:20px; overflow:hidden; display:flex; flex-direction:column;">

        <!-- Header -->
        <div style="padding:14px 16px; background:linear-gradient(135deg,rgba(124,58,237,0.25),rgba(59,130,246,0.15)); border-bottom:1px solid rgba(255,255,255,0.06); display:flex; align-items:center; gap:12px; flex-shrink:0;">
            <div style="position:relative; flex-shrink:0;">
                <div style="width:38px; height:38px; border-radius:50%; background:linear-gradient(135deg,#7c3aed,#3b82f6); display:flex; align-items:center; justify-content:center; font-weight:800; font-size:15px; color:white;">N</div>
                <div style="position:absolute; bottom:1px; right:1px; width:10px; height:10px; background:#22c55e; border-radius:50%; border:2px solid rgba(10,11,15,0.97);"></div>
            </div>
            <div style="flex:1;">
                <p style="font-weight:700; font-size:14px; color:white; margin:0; letter-spacing:0.3px;">NexBot</p>
                <p style="font-size:11px; color:#22c55e; margin:0; font-weight:500;">● Online — ready to help</p>
            </div>
            <button onclick="nexToggle()" style="background:rgba(255,255,255,0.06); border:none; border-radius:8px; padding:6px; cursor:pointer; color:rgba(255,255,255,0.5); transition:all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.12)';this.style.color='white'" onmouseout="this.style.background='rgba(255,255,255,0.06)';this.style.color='rgba(255,255,255,0.5)'">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Messages -->
        <div id="nexbot-messages" style="flex:1; overflow-y:auto; padding:16px; display:flex; flex-direction:column; gap:12px; background:rgba(10,11,15,0.97);">
            <div class="nex-msg-bot" style="display:flex; gap:8px; align-items:flex-start;">
                <div style="width:26px; height:26px; border-radius:50%; background:linear-gradient(135deg,#7c3aed,#3b82f6); display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:800; color:white; flex-shrink:0; margin-top:2px;">N</div>
                <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.08); border-radius:16px; border-top-left-radius:4px; padding:10px 14px; font-size:13px; color:rgba(255,255,255,0.85); max-width:82%; line-height:1.5;">
                    Hey! 👋 I'm <strong style="color:#a78bfa;">NexBot</strong>. Ask me about products, vendors or anything in the store!
                </div>
            </div>
        </div>

        <!-- Input -->
        <div style="padding:12px; background:rgba(10,11,15,0.98); border-top:1px solid rgba(255,255,255,0.06); display:flex; gap:8px; flex-shrink:0;">
            <input
                id="nexbot-input"
                class="nex-input"
                type="text"
                placeholder="Ask me anything..."
                style="flex:1; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1); border-radius:50px; padding:10px 18px; font-size:13px; color:white; outline:none; font-family:inherit; transition:all 0.2s;"
                onkeydown="if(event.key==='Enter') nexSend()"
            >
            <button onclick="nexSend()" class="nex-send-btn" style="width:40px; height:40px; border-radius:50%; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </div>
    </div>

    <!-- Toggle Button -->
    <!-- Reemplaza el botón toggle completo -->
<button onclick="nexToggle()" class="nex-toggle-btn" style="width:56px; height:56px; border-radius:50%; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center; position:relative;">
    
    <!-- Anillos de pulso múltiples -->
    <div style="position:absolute;inset:-6px;border-radius:50%;border:2px solid rgba(139,92,246,0.5);animation:nexRing1 2s ease-out infinite;"></div>
    <div style="position:absolute;inset:-6px;border-radius:50%;border:2px solid rgba(99,102,241,0.3);animation:nexRing1 2s ease-out infinite 0.6s;"></div>
    <div style="position:absolute;inset:-6px;border-radius:50%;border:2px solid rgba(59,130,246,0.2);animation:nexRing1 2s ease-out infinite 1.2s;"></div>

    <!-- Glow interior -->
    <div style="position:absolute;inset:0;border-radius:50%;background:radial-gradient(circle,rgba(139,92,246,0.4) 0%,transparent 70%);animation:nexGlowPulse 2s ease-in-out infinite;"></div>

    <!-- Badge de notificación -->
    <div id="nex-badge" style="position:absolute;top:-2px;right:-2px;width:14px;height:14px;background:#22c55e;border-radius:50%;border:none;animation:nexBadgePop 1.5s ease-in-out infinite;z-index:2;"></div>
    <svg id="nex-icon-chat" width="24" height="24" fill="none" stroke="white" viewBox="0 0 24 24" style="position:relative;z-index:1;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
    <svg id="nex-icon-close" width="22" height="22" fill="none" stroke="white" viewBox="0 0 24 24" style="display:none;position:relative;z-index:1;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
</button>
</div>

<script>
    let nexOpen = false;

    function nexToggle() {
        nexOpen = !nexOpen;
        const win = document.getElementById('nexbot-window');
        const iconChat = document.getElementById('nex-icon-chat');
        const iconClose = document.getElementById('nex-icon-close');
        win.classList.toggle('nex-hidden', !nexOpen);
        win.classList.toggle('nex-visible', nexOpen);
        iconChat.style.display = nexOpen ? 'none' : 'block';
        iconClose.style.display = nexOpen ? 'block' : 'none';
    }

    function nexAppendMsg(text, role) {
        const messages = document.getElementById('nexbot-messages');
        const wrap = document.createElement('div');
        wrap.className = role === 'user' ? 'nex-msg-user' : 'nex-msg-bot';
        wrap.style.cssText = 'display:flex; gap:8px; align-items:flex-start;' + (role === 'user' ? 'justify-content:flex-end;' : '');

        if (role === 'bot') {
            wrap.innerHTML = `
                <div style="width:26px;height:26px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#3b82f6);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:white;flex-shrink:0;margin-top:2px;">N</div>
                <div style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.08);border-radius:16px;border-top-left-radius:4px;padding:10px 14px;font-size:13px;color:rgba(255,255,255,0.85);max-width:82%;line-height:1.6;white-space:pre-wrap;word-break:break-word;"></div>`;
            wrap.querySelector('div:last-child').textContent = text;
        } else {
            const bubble = document.createElement('div');
            bubble.style.cssText = 'background:rgba(124,58,237,0.25);border:1px solid rgba(124,58,237,0.3);border-radius:16px;border-top-right-radius:4px;padding:10px 14px;font-size:13px;color:rgba(255,255,255,0.9);max-width:82%;line-height:1.5;';
            bubble.textContent = text;
            wrap.appendChild(bubble);
        }

        messages.appendChild(wrap);
        messages.scrollTop = messages.scrollHeight;
        return wrap;
    }

    function nexTyping() {
        const messages = document.getElementById('nexbot-messages');
        const wrap = document.createElement('div');
        wrap.id = 'nex-typing';
        wrap.className = 'nex-msg-bot';
        wrap.style.cssText = 'display:flex; gap:8px; align-items:center;';
        wrap.innerHTML = `
            <div style="width:26px;height:26px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#3b82f6);display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:white;flex-shrink:0;">N</div>
            <div class="nex-typing" style="background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.08);border-radius:16px;border-top-left-radius:4px;padding:12px 16px;display:flex;gap:4px;align-items:center;">
                <span></span><span></span><span></span>
            </div>`;
        messages.appendChild(wrap);
        messages.scrollTop = messages.scrollHeight;
    }

    async function nexSend() {
        const input = document.getElementById('nexbot-input');
        const text = input.value.trim();
        if (!text) return;
        input.value = '';

        nexAppendMsg(text, 'user');
        nexTyping();

        try {
            const res = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ message: text })
            });
            const data = await res.json();
            document.getElementById('nex-typing')?.remove();
            nexAppendMsg(data.reply || 'No response.', 'bot');
        } catch(e) {
            document.getElementById('nex-typing')?.remove();
            nexAppendMsg('Connection error. Please try again.', 'bot');
        }
    }
</script>
</body>
</html>
