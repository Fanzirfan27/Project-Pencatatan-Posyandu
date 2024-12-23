<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanKesehatan;

class AdminLaporanController extends Controller
{
    public function laporan()
    {
        $data = PencatatanKesehatan::with([
            'anggotaPosyandu.kategori',
            'anggotaPosyandu.kategori',
            'jenisPemeriksaan',
        ])->get();

        return view('tampilan.dashboard_admin.laporanAdmin.index', compact('data'));
    
        }
}
