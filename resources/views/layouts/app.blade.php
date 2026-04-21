<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="#" class="text-gray-300 hover:text-white font-medium transition">Vendors</a>
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
                                    @if(Auth::user()->role_id == 1) {{-- Mockup for Admin --}}
                                        <span class="text-[9px] text-purple-400 font-bold uppercase tracking-wider group-hover:text-purple-300 transition-colors">Admin Panel</span>
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
    <footer class="bg-black py-12 border-t border-white/5 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-purple-600 to-blue-500 flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="font-bold text-xl tracking-tight">NexShop</span>
            </div>
            <p class="text-gray-500 text-sm">© 2026 NexShop Marketplace. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="text-gray-500 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
            </div>
        </div>
    </footer>

    <!-- Notifications -->
    <div id="notification-container" class="fixed bottom-10 right-10 z-[100] flex flex-col gap-4 pointer-events-none"></div>

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
</body>
</html>
