<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPosyandu;
use App\Models\KategoriAnggota;

class PengelolaanAnggotaController extends Controller
{
    public function index()
    {
        // Ambil semua data anggota bersama relasi kategori
        $anggota = AnggotaPosyandu::with('kategori')->get();
        // Kirim data ke view
        return view('tampilan.dashboard_admin.pengelolaanAnggota.index', compact('anggota'));
    }
}