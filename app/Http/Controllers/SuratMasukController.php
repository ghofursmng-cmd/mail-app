<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuks = SuratMasuk::latest()->paginate(10);
        return view('surat.index', compact('suratMasuks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_surat' => 'required|date',
            'nomor_agenda' => 'required|string',
            'nomor_surat' => 'required|string',
            'asal_surat' => 'required|string',
            'tanggal_terima' => 'required|date',
            'perihal' => 'required|string',
        ]);

        SuratMasuk::create($request->all());

        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not needed for this simple app
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_surat' => 'required|date',
            'nomor_agenda' => 'required|string',
            'nomor_surat' => 'required|string',
            'asal_surat' => 'required|string',
            'tanggal_terima' => 'required|date',
            'perihal' => 'required|string',
        ]);

        $surat = SuratMasuk::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = SuratMasuk::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}
