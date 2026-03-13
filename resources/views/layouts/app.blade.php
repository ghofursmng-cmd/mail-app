<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Aplikasi Persuratan') }} - Aplikasi Persuratan Premium</title>
    
    <!-- Google Fonts: Outfit (Headings) & Inter (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #10b981;
            --bg-main: #f8fafc;
            --sidebar-width: 280px;
        }

        .dark {
            --bg-main: #0f172a;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: #334155;
            margin: 0;
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark body {
            color: #f1f5f9;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        .premium-glass {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .dark .premium-glass {
            background: rgba(30, 41, 59, 0.8);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-item {
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            transform-origin: left;
        }

        .sidebar-item:hover {
            color: var(--primary);
            padding-left: 1.5rem;
            transform: scale(1.02) perspective(1000px) rotateY(5deg);
        }

        .active-nav {
            background: linear-gradient(135deg, #f5f8ff 0%, #ebf0ff 100%) !important;
            color: var(--primary) !important;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.1);
            position: relative;
        }

        .dark .active-nav {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%) !important;
            color: var(--primary-light) !important;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.1);
        }

        .active-nav::after {
            content: '';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
            animation: pulse-active 2s infinite;
        }

        @keyframes pulse-active {
            0% { transform: translateY(-50%) scale(1); opacity: 1; box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.7); }
            70% { transform: translateY(-50%) scale(1.1); opacity: 0.5; box-shadow: 0 0 0 10px rgba(79, 70, 229, 0); }
            100% { transform: translateY(-50%) scale(1); opacity: 1; box-shadow: 0 0 0 0 rgba(79, 70, 229, 0); }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-entrance { animation: fadeInScale 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* Custom Scrollbar */
        .sidebar nav::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar nav::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar nav::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
        .dark .sidebar nav::-webkit-scrollbar-thumb {
            background: #334155;
        }

        .main-content {
            position: relative;
            background-image: radial-gradient(circle at 2px 2px, rgba(0,0,0,0.02) 1px, transparent 0);
            background-size: 40px 40px;
        }
        .dark .main-content {
            background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.02) 1px, transparent 0);
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      :class="{ 'dark': darkMode }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
      class="antialiased font-sans">
    @auth
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed top-0 left-0 bottom-0 w-[280px] bg-white border-r border-slate-200 z-50 flex flex-col p-6 shadow-[4px_0_24px_rgba(0,0,0,0.02)] transition-colors duration-300 dark:bg-slate-900 dark:border-slate-800">
        <div class="mb-12 px-2">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 dark:shadow-indigo-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="overflow-hidden">
                    <span class="text-xl font-[900] tracking-tighter text-slate-800 block leading-none dark:text-slate-100">MAIL SYSTEM</span>
                    <span class="text-[8px] font-extrabold text-indigo-600 uppercase tracking-[0.2em] leading-normal dark:text-indigo-400">Smart Governance</span>
                </div>
            </div>
        </div>

        <nav class="flex-1 space-y-2 overflow-y-auto px-2">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4 px-2">Menu Utama</p>
            
            @foreach($activeMenus as $menu)
                @php
                    $hasChildren = $menu->children->count() > 0;
                    $isRoute = Route::has($menu->url);
                    $url = ($isRoute && !$hasChildren) ? route($menu->url) : ($hasChildren ? '#' : url($menu->url));
                    $isActive = $hasChildren 
                        ? $menu->children->contains(fn($child) => Route::has($child->url) ? request()->routeIs($child->url . '*') : request()->is(trim($child->url, '/') . '*'))
                        : ($isRoute ? request()->routeIs($menu->url . '*') : request()->is(trim($menu->url, '/') . '*'));
                @endphp

                <div x-data="{ open: {{ $isActive ? 'true' : 'false' }} }" class="w-full">
                    <a href="{{ $url }}" 
                       @if($hasChildren) @click.prevent="open = !open" @endif
                       class="sidebar-item group flex items-center justify-between px-4 py-3 rounded-xl text-slate-600 font-medium transition-all duration-200 {{ $isActive && !$hasChildren ? 'active-nav' : 'hover:bg-slate-50' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-slate-400 group-hover:text-indigo-600 transition-colors {{ $isActive ? 'text-indigo-600' : '' }}">
                                @if($menu->icon)
                                    {!! $menu->icon !!}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                @endif
                            </span>
                            <span class="{{ $isActive ? 'text-slate-900' : '' }}">{{ $menu->name }}</span>
                        </div>
                        
                        @if($hasChildren)
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-4 w-4 transition-transform duration-200" 
                                 :class="open ? 'rotate-180' : ''" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        @endif
                    </a>

                    @if($hasChildren)
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 -translate-y-4 scale-95 origin-top"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100 origin-top"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0 scale-100 origin-top"
                             x-transition:leave-end="opacity-0 -translate-y-4 scale-95 origin-top"
                             class="mt-1 ml-9 space-y-1 border-l-2 border-slate-100 dark:border-slate-800 pl-4 overflow-hidden">
                            @foreach($menu->children as $index => $child)
                                @php
                                    $childIsRoute = Route::has($child->url);
                                    $childUrl = $childIsRoute ? route($child->url) : url($child->url);
                                    $childActive = $childIsRoute ? request()->routeIs($child->url . '*') : request()->is(trim($child->url, '/') . '*');
                                @endphp
                                <a href="{{ $childUrl }}" 
                                   class="block px-3 py-2 text-sm font-medium rounded-lg transition-all duration-300 {{ $childActive ? 'text-indigo-600 bg-indigo-50/50 dark:bg-indigo-900/10' : 'text-slate-500 hover:text-indigo-600 hover:bg-slate-50 dark:hover:bg-slate-800' }} animate-entrance"
                                   style="animation-delay: {{ ($index + 1) * 0.1 }}s">
                                    {{ $child->name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="pt-6 border-t border-slate-100 dark:border-slate-800 mt-6 pt-6">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4 px-2">Kustomisasi</p>
                <button @click="darkMode = !darkMode" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-slate-600 dark:text-slate-400 font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 group">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                        <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 18v1m9-9h1m-18 0H2m3.364-7.364l-.707-.707m12.728 12.728l-.707-.707M6.343 17.657l-.707.707M17.657 6.343l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    Ubah Tampilan
                </button>
            </div>

            <div class="pt-6">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4 px-2">Sistem</p>
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="sidebar-item w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-500 font-semibold hover:bg-red-50 dark:hover:bg-red-900/10 transition-all duration-200 group">
                        <div class="w-8 h-8 rounded-lg bg-red-100 dark:bg-red-900/30 flex items-center justify-center text-red-600 group-hover:bg-red-600 group-hover:text-white transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </div>
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <div class="mt-auto p-4 bg-slate-50 rounded-2xl">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-400 truncate uppercase tracking-tighter">{{ Auth::user()->level }}</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Overlay mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/20 backdrop-blur-sm z-40 hidden lg:hidden"></div>

    <!-- Main Content -->
    <main class="main-content ml-[280px] p-4 md:p-8 min-h-screen">
        <!-- Topbar Mobile Only -->
        <div class="lg:hidden flex items-center justify-between mb-6 bg-white p-4 rounded-2xl border border-slate-200">
            <button id="sidebar-toggle" class="p-2 text-slate-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <div class="text-right">
                <span class="font-bold tracking-tight text-slate-800 block leading-tight">MAIL SYSTEM</span>
                <span class="text-[8px] font-bold text-indigo-600 uppercase tracking-wider">Persuratan DISDIKPORA</span>
            </div>
            <div class="w-10"></div>
        </div>
    @else
    <main class="min-h-screen p-4 md:p-8 flex flex-col justify-center">
    @endauth

        <div class="max-w-7xl mx-auto w-full">
            @if(session('success'))
                <div id="alert-success" class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center gap-3 shadow-sm animate-in fade-in slide-in-from-top-4 duration-500">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm">Berhasil!</p>
                        <p class="text-xs opacity-90">{{ session('success') }}</p>
                    </div>
                    <button onclick="document.getElementById('alert-success').remove()" class="ml-auto text-emerald-400 hover:text-emerald-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endif

            @yield('content')
        </div>
        
        <footer class="mt-20 py-8 border-t border-slate-200 dark:border-slate-800 text-center text-slate-400 dark:text-slate-500 text-xs tracking-wide">
            &copy; {{ date('Y') }} MAIL APP PREMUM. <span class="mx-2">|</span> INTEGRATED MANAGEMENT SYSTEM.
        </footer>
    </main>

    <script>
        // Sidebar Toggle for Mobile
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const toggle = document.getElementById('sidebar-toggle');

        if(toggle) {
            toggle.addEventListener('click', () => {
                sidebar.classList.add('active');
                overlay.classList.remove('hidden');
            });

            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                overlay.classList.add('hidden');
            });
        }
    </script>
</body>
</html>
