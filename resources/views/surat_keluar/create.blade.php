@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight text-emerald-600">Tambah Surat Keluar</h1>
            <p class="text-slate-500 mt-1 font-medium italic">Masukkan informasi detail surat keluar baru.</p>
        </div>
        <a href="{{ route('surat-keluar.index') }}" class="text-slate-400 hover:text-slate-600 p-2 rounded-xl transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
        <form action="{{ route('surat-keluar.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Group 1: Informasi Dasar -->
                <div class="space-y-6">
                    <p class="text-[10px] font-bold text-emerald-600 uppercase tracking-widest border-b border-emerald-50 pb-2">Informasi Dasar</p>
                    
                    <div>
                        <label for="nomor_surat" class="block text-sm font-bold text-slate-700 mb-2">Nomor Surat</label>
                        <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 font-medium @error('nomor_surat') border-red-500 @enderror">
                        @error('nomor_surat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="tanggal_surat" class="block text-sm font-bold text-slate-700 mb-2">Tanggal Kirim</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all font-medium @error('tanggal_surat') border-red-500 @enderror">
                        @error('tanggal_surat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Group 2: Penerima -->
                <div class="space-y-6">
                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest border-b border-blue-50 pb-2">Destinasi</p>

                    <div>
                        <label for="tujuan_surat" class="block text-sm font-bold text-slate-700 mb-2">Tujuan Surat</label>
                        <input type="text" name="tujuan_surat" id="tujuan_surat" value="{{ old('tujuan_surat') }}" required
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 font-medium @error('tujuan_surat') border-red-500 @enderror">
                        @error('tujuan_surat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Full Width Fields -->
            <div class="space-y-6 pt-4 border-t border-slate-50">
                <div>
                    <label for="perihal" class="block text-sm font-bold text-slate-700 mb-2">Perihal / Isi Ringkas</label>
                    <textarea name="perihal" id="perihal" rows="5" required
                        class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all placeholder:text-slate-300 font-medium @error('perihal') border-red-500 @enderror">{{ old('perihal') }}</textarea>
                    @error('perihal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-6">
                <a href="{{ route('surat-keluar.index') }}" class="px-8 py-3.5 rounded-2xl font-bold text-slate-400 hover:text-slate-600 hover:bg-slate-50 transition-all text-sm">
                    Batal
                </a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-10 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-emerald-100 hover:-translate-y-0.5 active:scale-95 text-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
