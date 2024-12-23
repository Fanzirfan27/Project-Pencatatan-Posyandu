<?php
namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use Illuminate\Http\Request;

class JenisPemeriksaanController extends Controller
{
    public function index()
    {
        $data = JenisPemeriksaan::all();
        return view('tampilan.dashboard_admin.jenisPemeriksaan.index', compact('data'));
    }

    public function create()
    {
        return view('tampilan.dashboard_admin.jenisPemeriksaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_pemeriksaan' => 'required|string|max:255',
        ]);

        JenisPemeriksaan::create([
            'nama_jenis_pemeriksaan' => $request->nama_jenis_pemeriksaan,
        ]);

        return redirect()->route('jenis_pemeriksaan.index')
        ->with('alert', [
            'type' => 'success',
            'message' => 'Anggota berhasil ditambahkan.'
        ]);
    }

    public function edit($id)
    {
        $item = JenisPemeriksaan::findOrFail($id);
        return view('tampilan.dashboard_admin.jenisPemeriksaan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenis_pemeriksaan' => 'required|string|max:255',
        ]);

        $item = JenisPemeriksaan::findOrFail($id);
        $item->update([
            'nama_jenis_pemeriksaan' => $request->nama_jenis_pemeriksaan,
        ]);

        return redirect()->route('jenis_pemeriksaan.index')
        ->with('alert', [
            'type' => 'warning',
            'message' => 'Anggota berhasil diperbarui.'
        ]);
    }

    public function destroy($id)
    {
        $item = JenisPemeriksaan::findOrFail($id);
        $item->delete();

        return redirect()->route('jenis_pemeriksaan.index')
        ->with('alert', [
            'type' => 'error',
            'message' => 'Anggota berhasil dihapus.'
        ]);;
    }
}
