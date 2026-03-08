<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_masuk' => SuratMasuk::count(),
            'total_keluar' => SuratKeluar::count(),
            'recent_masuk' => SuratMasuk::latest()->take(5)->get(),
            'recent_keluar' => SuratKeluar::latest()->take(5)->get(),
        ];

        return view('dashboard', compact('stats'));
    }
}
