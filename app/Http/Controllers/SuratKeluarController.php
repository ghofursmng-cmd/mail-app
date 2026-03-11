<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluars = SuratKeluar::latest()->paginate(10);
        return view('surat_keluar.index', compact('suratKeluars'));
    }

    public function create()
    {
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tujuan_surat' => 'required|string',
            'perihal' => 'required|string',
        ]);

        SuratKeluar::create($request->all());

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat_keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'tujuan_surat' => 'required|string',
            'perihal' => 'required|string',
        ]);

        $suratKeluar->update($request->all());

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil diupdate.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        $suratKeluar->delete();
        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil dihapus.');
    }

    public function print()
    {
        $suratKeluars = SuratKeluar::latest()->get();
        return view('surat_keluar.report', compact('suratKeluars'));
    }

    public function exportExcel()
    {
        $suratKeluars = SuratKeluar::latest()->get();
        $filename = "laporan_surat_keluar_" . date('Y-m-d') . ".xls";
        
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

        // Add BOM for UTF-8 Excel support
        echo chr(0xEF).chr(0xBB).chr(0xBF);
        
        return view('surat_keluar.report', compact('suratKeluars'));
    }

    public function exportWord()
    {
        $suratKeluars = SuratKeluar::latest()->get();
        $filename = "laporan_surat_keluar_" . date('Y-m-d') . ".doc";
        
        header("Content-Type: application/msword");
        header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=\"" . $filename . "\"");
        
        return view('surat_keluar.report', compact('suratKeluars'));
    }
}
