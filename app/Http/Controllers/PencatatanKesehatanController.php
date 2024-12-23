<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPosyandu;
use App\Models\JenisPemeriksaan;
use App\Models\PencatatanKesehatan;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\PencatatanKesehatanExport; 
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


class PencatatanKesehatanController extends Controller
{
    public function index()
    {
        $pencatatanKesehatan = PencatatanKesehatan::all();
        return view('tampilan.pages.DataPencatatanKesehatan.index', compact('pencatatanKesehatan'));
    }

    public function create()
    {
        $anggotaPosyandu = AnggotaPosyandu::all();
        $jenisPemeriksaan = JenisPemeriksaan::all();
        return view('tampilan.pages.DataPencatatanKesehatan.create', compact('anggotaPosyandu', 'jenisPemeriksaan'));
    }

    public function store(Request $request)
    {
        PencatatanKesehatan::create($request->all());
        return redirect()->route('pencatatan-kesehatan.index')
        ->with('alert', [
            'type' => 'success',
            'message' => 'Anggota berhasil ditambahkan.'
        ]);;
    }

    public function show($id)
    {
        $pencatatanKesehatan = PencatatanKesehatan::with(['anggotaPosyandu.kategori', 'jenisPemeriksaan'])->findOrFail($id);
        return view('tampilan.pages.DataPencatatanKesehatan.show', compact('pencatatanKesehatan'));
    }


    public function edit($id)
    {
        $pencatatanKesehatan = PencatatanKesehatan::findOrFail($id);
        $anggotaPosyandu = AnggotaPosyandu::all();
        $jenisPemeriksaan = JenisPemeriksaan::all();
        return view('tampilan.pages.DataPencatatanKesehatan.edit', compact('pencatatanKesehatan', 'anggotaPosyandu', 'jenisPemeriksaan'));
    }

    public function update(Request $request, $id)
    {
        $pencatatanKesehatan = PencatatanKesehatan::findOrFail($id);
        $pencatatanKesehatan->update($request->all());
        return redirect()->route('pencatatan-kesehatan.index')
        ->with('alert', [
            'type' => 'warning',
            'message' => 'Anggota berhasil diperbarui.'
        ]);;
    }

    public function destroy($id)
    {
        $pencatatanKesehatan = PencatatanKesehatan::findOrFail($id);
        $pencatatanKesehatan->delete();
        return redirect()->route('pencatatan-kesehatan.index')
        ->with('alert', [
            'type' => 'error',
            'message' => 'Anggota berhasil dihapus.'
        ]);;
    }

    public function laporan()
    {
        $data = PencatatanKesehatan::with(['anggotaPosyandu.kategori', 'jenisPemeriksaan'])->get();
        return view('tampilan.pages.laporan.index', compact('data'));
    }
    public function exportToExcel()
    {
        $data = PencatatanKesehatan::with(['anggotaPosyandu.kategori', 'jenisPemeriksaan'])->get();

        $exportData = $data->map(function ($item) {
            return [
                'Nama' => $item->anggotaPosyandu->nama_anggota ?? '-',
                'Kategori' => $item->anggotaPosyandu->kategori->nama_kategori_anggota ?? '-',
                'Jenis Pemeriksaan' => $item->jenisPemeriksaan->nama_jenis_pemeriksaan ?? '-',
                'Tanggal Pemeriksaan' => $item->tanggal_pemeriksaan ?? '-',
                'Alamat' => $item->anggotaPosyandu->alamat ?? '-',
                'Jenis Kelamin' => $item->anggotaPosyandu->jenis_kelamin ?? '-',
                'No Telepon' => $item->anggotaPosyandu->no_telepon ?? '-',
            ];
        });

        return Excel::download(new PencatatanKesehatanExport($exportData), 'laporan-pencatatan-kesehatan.xlsx');
    }
    
    public function exportToWord()
    {
        $data = PencatatanKesehatan::with(['anggotaPosyandu.kategori', 'jenisPemeriksaan'])->get();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Header
        $section->addText('Laporan Pencatatan Kesehatan', ['bold' => true, 'size' => 16]);
        $section->addTextBreak(1);

        // Tabel
        $table = $section->addTable();
        $table->addRow();
        $table->addCell()->addText('Nama');
        $table->addCell()->addText('Kategori');
        $table->addCell()->addText('Jenis Pemeriksaan');
        $table->addCell()->addText('Tanggal Pemeriksaan');
        $table->addCell()->addText('Alamat');
        $table->addCell()->addText('Jenis Kelamin');
        $table->addCell()->addText('No Telepon');

        foreach ($data as $item) {
            $table->addRow();
            $table->addCell()->addText($item->anggotaPosyandu->nama_anggota ?? '-');
            $table->addCell()->addText($item->anggotaPosyandu->kategori->nama_kategori_anggota ?? '-');
            $table->addCell()->addText($item->jenisPemeriksaan->nama_jenis_pemeriksaan ?? '-');
            $table->addCell()->addText($item->tanggal_pemeriksaan ?? '-');
            $table->addCell()->addText($item->anggotaPosyandu->alamat ?? '-');
            $table->addCell()->addText($item->anggotaPosyandu->jenis_kelamin ?? '-');
            $table->addCell()->addText($item->anggotaPosyandu->no_telepon ?? '-');
        }

        $filename = 'laporan-pencatatan-kesehatan.docx';
        $tempFile = storage_path($filename);

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        return response()->download($tempFile)->deleteFileAfterSend(true);
    }

}
