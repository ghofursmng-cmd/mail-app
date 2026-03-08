@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6 animate-in fade-in slide-in-from-bottom-4 duration-700">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Tambah Menu</h1>
            <p class="text-slate-500 mt-1 font-medium italic">Tambahkan item navigasi baru ke sidebar.</p>
        </div>
        <a href="{{ route('menu.index') }}" class="text-slate-400 hover:text-slate-600 p-2 rounded-xl transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8">
        <form action="{{ route('menu.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Menu</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="Contoh: Dashboard"
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all font-medium">
                    </div>

                    <div>
                        <label for="url" class="block text-sm font-bold text-slate-700 mb-2">URL / Route Name</label>
                        <input type="text" name="url" id="url" value="{{ old('url') }}" required placeholder="Contoh: dashboard atau /admin/settings"
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all font-medium font-mono text-sm text-indigo-600">
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label for="order" class="block text-sm font-bold text-slate-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 0) }}" required
                            class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all font-medium">
                    </div>

                    <div>
                        <label for="is_active" class="block text-sm font-bold text-slate-700 mb-2">Status</label>
                        <select name="is_active" id="is_active" class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all font-medium appearance-none bg-no-repeat bg-[right_1rem_center]">
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label for="icon" class="block text-sm font-bold text-slate-700 mb-2">Icon SVG (Optional)</label>
                <textarea name="icon" id="icon" rows="4" placeholder="Tempel kode SVG <svg>...</svg> di sini"
                    class="w-full px-4 py-3 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all font-mono text-xs text-slate-500 bg-slate-50/50">{{ old('icon') }}</textarea>
                <p class="text-[10px] text-slate-400 font-medium italic">Saran: Gunakan SVG Heroicons dengan class "h-5 w-5".</p>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-50">
                <a href="{{ route('menu.index') }}" class="px-8 py-3.5 rounded-2xl font-bold text-slate-400 hover:text-slate-600 transition-all text-sm">
                    Batal
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-slate-800 text-white px-10 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-indigo-100 hover:-translate-y-0.5 active:scale-95 text-sm">
                    Simpan Menu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
