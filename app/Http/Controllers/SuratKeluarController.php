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
        $filename = "laporan_surat_keluar_" . date('Y-m-d') . ".csv";
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $handle = fopen('php://output', 'w');
        // Add BOM for Excel UTF-8 recognition
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Header
        fputcsv($handle, ['No', 'Nomor Surat', 'Tanggal Surat', 'Tujuan Surat', 'Perihal']);
        
        foreach ($suratKeluars as $index => $surat) {
            fputcsv($handle, [
                $index + 1,
                $surat->nomor_surat,
                $surat->tanggal_surat,
                $surat->tujuan_surat,
                $surat->perihal
            ]);
        }
        
        fclose($handle);
        exit;
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
