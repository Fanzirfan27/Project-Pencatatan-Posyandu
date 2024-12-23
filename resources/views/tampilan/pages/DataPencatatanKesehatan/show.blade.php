@extends('tampilan.index')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID Pencatatan Kesehatan</th>
            <td>{{ $pencatatanKesehatan->id_pencatatan_kesehatan }}</td>
        </tr>
        <tr>
            <th>Nama Anggota</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->nama_anggota }}</td>
        </tr>
        <tr>
            <th>Kategori Anggota</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->kategori->nama_kategori_anggota }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->alamat }}</td>
        </tr>
        <tr>
            <th>No. Telepon</th>
            <td>{{ $pencatatanKesehatan->anggotaPosyandu->no_telepon }}</td>
        </tr>
        <tr>
            <th>Tanggal Pemeriksaan</th>
            <td>{{ $pencatatanKesehatan->tanggal_pemeriksaan }}</td>
        </tr>
        <tr>
            <th>Jenis Pemeriksaan</th>
            <td>{{ $pencatatanKesehatan->jenisPemeriksaan->nama_jenis_pemeriksaan }}</td>
        </tr>
    </table>
    <a href="{{ route('pencatatan-kesehatan.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
