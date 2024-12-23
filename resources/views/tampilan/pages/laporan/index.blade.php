@extends('tampilan.index')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Laporan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home_petugas') }}">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Jenis Pemeriksaan</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->anggotaPosyandu->nama_anggota ?? '-' }}</td>
                    <td>{{ $item->anggotaPosyandu->kategori->nama_kategori_anggota ?? '-' }}</td>
                    <td>{{ $item->jenisPemeriksaan->nama_jenis_pemeriksaan ?? '-' }}</td>
                    <td>{{ $item->tanggal_pemeriksaan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pencatatan-kesehatan.export-excel') }}" class="btn btn-success" title="Cetak ke Excel">
                            <i class="fas fa-file-excel"></i>
                        </a>
                        <a href="{{ route('pencatatan-kesehatan.export-word') }}" class="btn btn-primary" title="Cetak ke Word">
                            <i class="fas fa-file-word"></i>
                    
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
