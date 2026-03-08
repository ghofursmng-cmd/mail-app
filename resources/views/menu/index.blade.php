@extends('layouts.app')

@section('content')
<div class="space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pengaturan Menu</h1>
            <p class="text-slate-500 mt-1 font-medium italic">Kelola navigasi sidebar aplikasi secara dinamis.</p>
        </div>
        <a href="{{ route('menu.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-slate-800 text-white px-6 py-3 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-100 hover:-translate-y-0.5 active:scale-95 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Menu
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Urutan</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Nama Menu</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Route/URL</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Icon</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($menus as $menu)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-6">
                                <span class="text-sm font-bold text-indigo-600">#{{ $menu->order }}</span>
                            </td>
                            <td class="py-5 px-6">
                                <span class="text-sm font-bold text-slate-800">{{ $menu->name }}</span>
                            </td>
                            <td class="py-5 px-6">
                                <code class="text-[11px] bg-slate-100 px-2 py-1 rounded text-slate-500 font-mono">{{ $menu->url }}</code>
                            </td>
                            <td class="py-5 px-6 font-bold">
                                <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-slate-400 border border-slate-100">
                                    @if($menu->icon)
                                        {!! $menu->icon !!}
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                        </svg>
                                    @endif
                                </div>
                            </td>
                            <td class="py-5 px-6 text-right">
                                <div class="flex justify-end items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="p-2.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.707.707-2.828-2.828.707-.707zM11.365 5.828l-8.591 8.591a1 1 0 00-.272.508l-1 4a1 1 0 001.213 1.213l4-1a1 1 0 00.508-.272l8.591-8.591-2.828-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center text-slate-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-400 font-medium italic">Belum ada data menu.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-slate-50 bg-slate-50/30">
            {{ $menus->links() }}
        </div>
    </div>
</div>
@endsection
