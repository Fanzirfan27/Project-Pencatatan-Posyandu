<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPosyandu;
use App\Models\KategoriAnggota;
use App\Http\Controllers\Controller;

class AnggotaPosyanduController extends Controller
{
    public function index()
{
    // Ambil semua data anggota bersama relasi kategori
    $anggota = AnggotaPosyandu::with('kategori')->get();

    // Kirim data ke view
    return view('tampilan.pages.DataAnggota.index', compact('anggota'));
}

    public function create()
{
    $kategori = KategoriAnggota::all(); // Ambil kategori anggota
    return view('tampilan.pages.DataAnggota.create', compact('kategori'));
}

public function store(Request $request)
{
    $request->validate([ 
        'nama_anggota' => 'required|string',
        'kategori_anggota' => 'required|exists:kategori_anggota,id_kategori_anggota',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'no_telepon' => 'nullable|string|max:15',
    ]);

    AnggotaPosyandu::create($request->all());
    return redirect()->route('anggota-posyandu.index')
    ->with('alert', [
        'type' => 'success',
        'message' => 'Anggota berhasil ditambahkan.'
    ]);
}
public function edit($id)
{
    $anggota = AnggotaPosyandu::findOrFail($id);
    $kategori = KategoriAnggota::all();
    return view('tampilan.pages.DataAnggota.edit', compact('anggota', 'kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_anggota' => 'required|string',
        'kategori_anggota' => 'required|exists:kategori_anggota,id_kategori_anggota',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'no_telepon' => 'nullable|string|max:15',
    ]);

    $anggota = AnggotaPosyandu::findOrFail($id);
    $anggota->update($request->all());
    return redirect()->route('anggota-posyandu.index')
    ->with('alert', [
        'type' => 'warning',
        'message' => 'Anggota berhasil diperbarui.'
    ]);

}
public function destroy($id)
{
    $anggota = AnggotaPosyandu::findOrFail($id);
    $anggota->delete();
    return redirect()->back()
    ->with('alert', [
        'type' => 'error',
        'message' => 'Anggota berhasil dihapus.'
    ]);

}
}
