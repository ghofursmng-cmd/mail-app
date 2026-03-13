@extends('layouts.app')

@section('content')
<div class="space-y-10 animate-in fade-in slide-in-from-bottom-8 duration-1000">
    <!-- Premium Mountain Hero Header -->
    <div class="relative overflow-hidden bg-white/40 dark:bg-slate-800/40 p-10 rounded-[2.5rem] premium-glass shadow-xl border border-white/60 dark:border-slate-700/50 min-h-[400px] flex items-center group">
        <!-- Mountain Background -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/mountain_landscape_bg.png') }}" class="w-full h-full object-cover opacity-60 dark:opacity-40 transition-transform duration-[10s] group-hover:scale-110" alt="Mountain Background">
            <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/20 to-transparent dark:from-slate-900/90 dark:via-slate-900/20"></div>
        </div>
        
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-8 w-full animate-entrance">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 bg-white/80 dark:bg-slate-800/80 backdrop-blur-md rounded-3xl flex items-center justify-center shadow-2xl border border-white/50 dark:border-white/10 animate-float">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50/80 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 rounded-full text-[10px] font-bold uppercase tracking-[0.2em] backdrop-blur-sm">
                            <span class="relative flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                            </span>
                            Sistem Aktif & Terlindungi
                        </div>
                        <h1 class="text-4xl md:text-6xl font-[900] text-slate-900 dark:text-slate-100 tracking-tight leading-tight">
                            Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-indigo-400">{{ Auth::user()->name }}</span>
                        </h1>
                    </div>
                </div>
                <p class="text-slate-600 dark:text-slate-300 text-xl font-medium max-w-2xl leading-relaxed mt-4 drop-shadow-sm">
                    Kelola administrasi persuratan <span class="text-indigo-700 dark:text-indigo-400 font-black italic">Bidang PTK DISDIKPORA JEPARA</span> dengan pengalaman visual masa depan.
                </p>
            </div>
            
            <div class="hidden md:flex items-center gap-4 bg-white/30 dark:bg-white/5 backdrop-blur-md p-6 rounded-[2rem] border border-white/40 dark:border-white/5 shadow-inner">
                <div class="text-right">
                    <p class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-widest leading-none mb-1">Hari Ini</p>
                    <p class="text-2xl font-black text-indigo-700 dark:text-indigo-400 leading-none">{{ now()->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section - Elegant Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Surat Masuk Card -->
        <div class="group relative bg-white dark:bg-slate-800 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-100 dark:hover:shadow-indigo-900/20 hover:-translate-y-2 animate-float">
            <div class="w-14 h-14 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-indigo-600 group-hover:text-white transition-all transform group-hover:rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
            <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Database</p>
            <h3 class="text-sm font-extrabold text-slate-800 dark:text-slate-200">Surat Masuk</h3>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-900 dark:text-slate-100">{{ $stats['total_masuk'] }}</span>
                <span class="text-[8px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Dokumen</span>
            </div>
        </div>

        <!-- Surat Keluar Card -->
        <div class="group relative bg-white dark:bg-slate-800 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm transition-all duration-500 hover:shadow-2xl hover:shadow-emerald-100 dark:hover:shadow-emerald-900/20 hover:-translate-y-2 animate-float" style="animation-delay: 0.5s;">
            <div class="w-14 h-14 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-emerald-600 group-hover:text-white transition-all transform group-hover:rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            </div>
            <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Database</p>
            <h3 class="text-sm font-extrabold text-slate-800 dark:text-slate-200">Surat Keluar</h3>
            <div class="flex items-baseline gap-2 mt-2">
                <span class="text-3xl font-black text-slate-900 dark:text-slate-100">{{ $stats['total_keluar'] }}</span>
                <span class="text-[8px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Dokumen</span>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="group relative bg-white dark:bg-slate-800 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-sm transition-all duration-500 hover:shadow-2xl hover:shadow-purple-100 dark:hover:shadow-purple-900/20 hover:-translate-y-2 animate-float" style="animation-delay: 1s;">
            <div class="w-14 h-14 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-all transform group-hover:rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Input Cepat</p>
            <h3 class="text-sm font-extrabold text-slate-800 dark:text-slate-200">Tambah Data</h3>
            <div class="flex gap-2 mt-4">
                <a href="{{ route('surat.create') }}" class="flex-1 bg-indigo-50 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 py-2 rounded-xl text-[8px] font-black uppercase text-center hover:bg-indigo-600 hover:text-white transition-all">Masuk</a>
                <a href="{{ route('surat-keluar.create') }}" class="flex-1 bg-emerald-50 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 py-2 rounded-xl text-[8px] font-black uppercase text-center hover:bg-emerald-600 hover:text-white transition-all">Keluar</a>
            </div>
        </div>

        <!-- Exit Card -->
        <div class="group relative bg-red-50 dark:bg-red-900/10 p-6 rounded-[2rem] border border-red-100 dark:border-red-900/30 shadow-sm transition-all duration-500 hover:shadow-2xl hover:shadow-red-200 dark:hover:shadow-red-900/40 hover:-translate-y-2 animate-float" style="animation-delay: 1.5s;">
            <div class="w-14 h-14 bg-white dark:bg-red-900/50 text-red-600 dark:text-red-300 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-red-600 group-hover:text-white transition-all transform group-hover:rotate-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </div>
            <p class="text-red-400 dark:text-red-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">Sesi</p>
            <h3 class="text-sm font-extrabold text-red-800 dark:text-red-200 italic uppercase">Keluar / Exit</h3>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-xl text-[8px] font-black uppercase tracking-widest text-center shadow-lg hover:bg-red-700 transition-all transform active:scale-95">
                    Logout Sistem
                </button>
            </form>
        </div>
    </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 animate-entrance" style="animation-delay: 2s;">
        <!-- New Activity Masuk -->
        <div class="space-y-4">
            <div class="flex items-center justify-between px-2">
                <h3 class="text-xl font-[900] text-slate-800 dark:text-slate-100 tracking-tight flex items-center gap-3">
                    <span class="w-8 h-1 bg-indigo-600 rounded-full"></span>
                    Surat Masuk Baru
                </h3>
                <a href="{{ route('surat.index') }}" class="text-[10px] font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-widest opacity-60 hover:opacity-100 transition-opacity">Selengkapnya</a>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-[2rem] border border-slate-100 dark:border-slate-700 p-4 space-y-3 shadow-sm">
                @forelse($stats['recent_masuk'] as $sm)
                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-all group border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-500 dark:text-indigo-400 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">{{ $sm->perihal }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] font-black text-slate-400 dark:text-slate-500 truncate uppercase tracking-tighter">{{ $sm->asal_surat }}</span>
                            <span class="w-1 h-1 bg-slate-200 dark:bg-slate-700 rounded-full"></span>
                            <span class="text-[10px] font-bold text-indigo-400 dark:text-indigo-500 italic">{{ \Carbon\Carbon::parse($sm->tanggal_terima)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="py-12 text-center text-slate-400 italic text-sm font-medium">Belum ada aktivitas masuk terbaru.</p>
                @endforelse
            </div>
        </div>

        <!-- New Activity Keluar -->
        <div class="space-y-4">
            <div class="flex items-center justify-between px-2">
                <h3 class="text-xl font-[900] text-slate-800 dark:text-slate-100 tracking-tight flex items-center gap-3">
                    <span class="w-8 h-1 bg-emerald-500 rounded-full"></span>
                    Surat Keluar Baru
                </h3>
                <a href="{{ route('surat-keluar.index') }}" class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-widest opacity-60 hover:opacity-100 transition-opacity">Selengkapnya</a>
            </div>
            <div class="bg-white dark:bg-slate-800 rounded-[2rem] border border-slate-100 dark:border-slate-700 p-4 space-y-3 shadow-sm">
                @forelse($stats['recent_keluar'] as $sk)
                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-all group border border-transparent hover:border-slate-100 dark:hover:border-slate-600">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-500 dark:text-emerald-400 group-hover:scale-110 transition-transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 dark:text-slate-200 truncate group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">{{ $sk->perihal }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] font-black text-slate-400 dark:text-slate-500 truncate uppercase tracking-tighter">Ke: {{ $sk->tujuan_surat }}</span>
                            <span class="w-1 h-1 bg-slate-200 dark:bg-slate-700 rounded-full"></span>
                            <span class="text-[10px] font-bold text-emerald-400 dark:text-emerald-500 italic">{{ \Carbon\Carbon::parse($sk->tanggal_surat)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <p class="py-12 text-center text-slate-400 italic text-sm font-medium">Belum ada aktivitas keluar terbaru.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
