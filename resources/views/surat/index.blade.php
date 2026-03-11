@extends('layouts.app')

@section('content')
<div class="space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Surat Masuk</h1>
            <p class="text-slate-500 mt-1 font-medium">Manajemen arsip surat masuk yang diterima.</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- Export Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.away="open = false" class="inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-700 px-5 py-3 rounded-2xl font-bold transition-all shadow-sm hover:bg-slate-50 active:scale-95 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Ekspor & Cetak
                </button>
                <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 z-50 py-2" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-[-10px]"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                    <a href="{{ route('surat.print') }}?print=true" target="_blank" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak Laporan
                    </a>
                    <a href="{{ route('surat.excel') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Ekspor Excel
                    </a>
                    <a href="{{ route('surat.word') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        Ekspor Word
                    </a>
                </div>
            </div>

            <a href="{{ route('surat.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-100 hover:-translate-y-0.5 active:scale-95 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Surat
            </a>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50">
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Agenda/Tanggal</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Detail Surat</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Asal Surat</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px]">Perihal</th>
                        <th class="py-5 px-6 font-bold text-slate-400 uppercase tracking-widest text-[10px] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($suratMasuks as $surat)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            <td class="py-5 px-6">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-800">#{{ $surat->nomor_agenda }}</span>
                                    <span class="text-[11px] text-slate-400 font-medium uppercase tracking-tighter">{{ \Carbon\Carbon::parse($surat->tanggal_terima)->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <div class="flex flex-col">
                                    <span class="text-sm font-semibold text-slate-700 leading-tight">{{ $surat->nomor_surat }}</span>
                                    <span class="text-[11px] text-slate-400 font-medium">{{ \Carbon\Carbon::parse($surat->tanggal_surat)->format('d M Y') }}</span>
                                </div>
                            </td>
                            <td class="py-5 px-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[11px] font-bold border border-indigo-100">
                                    {{ $surat->asal_surat }}
                                </span>
                            </td>
                            <td class="py-5 px-6">
                                <p class="text-sm text-slate-600 line-clamp-2 max-w-xs leading-relaxed font-medium">{{ Str::limit($surat->perihal, 60) }}</p>
                            </td>
                            <td class="py-5 px-6 text-right">
                                <div class="flex justify-end items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <a href="{{ route('surat.edit', $surat->id) }}" class="p-2.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.707.707-2.828-2.828.707-.707zM11.365 5.828l-8.591 8.591a1 1 0 00-.272.508l-1 4a1 1 0 001.213 1.213l4-1a1 1 0 00.508-.272l8.591-8.591-2.828-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')" class="inline">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4a2 2 0 012-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <p class="text-slate-400 font-medium italic">Belum ada data surat masuk.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-slate-50 bg-slate-50/30">
            {{ $suratMasuks->links() }}
        </div>
    </div>
</div>
@endsection
