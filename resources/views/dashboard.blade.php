@extends('layouts.app')

@section('content')
<div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Welcome Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white/40 p-8 rounded-3xl premium-glass">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Halo, {{ Auth::user()->name }}!</h1>
            <p class="text-slate-500 mt-1 font-medium italic">Selamat datang kembali di dashboard MailApp.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-xs font-bold uppercase tracking-widest border border-indigo-100">
                {{ now()->format('d M Y') }}
            </span>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-50 transition-all group overflow-hidden relative">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-indigo-600/10 text-indigo-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
                <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Total Surat Masuk</p>
                <h3 class="text-4xl font-extrabold text-slate-800 mt-1">{{ $stats['total_masuk'] }}</h3>
                <a href="{{ route('surat.index') }}" class="inline-flex items-center gap-2 text-indigo-600 text-xs font-bold mt-4 hover:gap-3 transition-all">
                    Lihat detail <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-50 transition-all group overflow-hidden relative">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full opacity-50 group-hover:scale-110 transition-transform duration-500"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-emerald-600/10 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                </div>
                <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Total Surat Keluar</p>
                <h3 class="text-4xl font-extrabold text-slate-800 mt-1">{{ $stats['total_keluar'] }}</h3>
                <a href="{{ route('surat-keluar.index') }}" class="inline-flex items-center gap-2 text-emerald-600 text-xs font-bold mt-4 hover:gap-3 transition-all">
                    Lihat detail <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </a>
            </div>
        </div>

        <!-- card 3 - quick actions -->
        <div class="bg-indigo-600 p-6 rounded-3xl shadow-lg shadow-indigo-100 group relative flex flex-col justify-between overflow-hidden">
            <div class="absolute -right-4 -top-4 w-32 h-32 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-700"></div>
            <div class="relative z-10">
                <h3 class="text-xl font-bold text-white mb-2 leading-tight">Kelola persuratan hari ini?</h3>
                <p class="text-indigo-100 text-sm opacity-80 mb-6 font-medium">Tambah data surat masuk atau keluar dengan cepat.</p>
            </div>
            <div class="relative z-10 flex gap-3">
                <a href="{{ route('surat.create') }}" class="flex-1 bg-white hover:bg-indigo-50 text-indigo-600 py-3 rounded-2xl text-center text-xs font-bold transition-all transform active:scale-95 shadow-sm">
                    + Surat Masuk
                </a>
                <a href="{{ route('surat-keluar.create') }}" class="flex-1 bg-indigo-500 hover:bg-indigo-400 text-white py-3 rounded-2xl text-center text-xs font-bold transition-all transform active:scale-95 border border-indigo-400/30">
                    + Surat Keluar
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-4">
        <!-- Recent Surat Masuk -->
        <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm">
            <div class="p-6 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800">Surat Masuk Terbaru</h3>
                <a href="{{ route('surat.index') }}" class="text-indigo-600 text-xs font-bold hover:underline">Lihat Semua</a>
            </div>
            <div class="divide-y divide-slate-50">
                @forelse($stats['recent_masuk'] as $sm)
                <div class="p-4 hover:bg-slate-50 transition-colors flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ $sm->perihal }}</p>
                        <p class="text-[10px] text-slate-400 font-medium uppercase truncate tracking-wider">{{ $sm->asal_surat }} • {{ \Carbon\Carbon::parse($sm->tanggal_terima)->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-slate-400 italic text-sm">Belum ada data surat masuk.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Surat Keluar -->
        <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm">
            <div class="p-6 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800">Surat Keluar Terbaru</h3>
                <a href="{{ route('surat-keluar.index') }}" class="text-emerald-600 text-xs font-bold hover:underline">Lihat Semua</a>
            </div>
            <div class="divide-y divide-slate-50">
                @forelse($stats['recent_keluar'] as $sk)
                <div class="p-4 hover:bg-slate-50 transition-colors flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center flex-shrink-0 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-sm font-bold text-slate-800 truncate">{{ $sk->perihal }}</p>
                        <p class="text-[10px] text-slate-400 font-medium uppercase truncate tracking-wider">Ke: {{ $sk->tujuan_surat }} • {{ \Carbon\Carbon::parse($sk->tanggal_surat)->diffForHumans() }}</p>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-slate-400 italic text-sm">Belum ada data surat keluar.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
