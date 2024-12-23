@extends('tampilan.dashboard_admin.content')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Laporan Lengkap</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Laporan Lengkap</li>
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
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->anggotaPosyandu->nama_anggota ?? '-' }}</td>
                    <td>{{ $item->anggotaPosyandu->kategori->nama_kategori_anggota ?? '-' }}</td>
                    <td>{{ $item->jenisPemeriksaan->nama_jenis_pemeriksaan ?? '-' }}</td>
                    <td>{{ $item->tanggal_pemeriksaan ?? '-' }}</td>
                    <td>{{ $item->anggotaPosyandu->alamat ?? '-' }}</td>
                    <td>{{ $item->anggotaPosyandu->jenis_kelamin ?? '-' }}</td>
                    <td>{{ $item->anggotaPosyandu->no_telepon ?? '-' }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
