@extends('tampilan.index')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Pencatatan Kesehatan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home_petugas') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Pencatatan Kesehatan</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
    
    <a href="{{ route('pencatatan-kesehatan.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Anggota</th>
                <th>Jenis Pemeriksaan</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pencatatanKesehatan as $data)
                <tr>
                    <td>{{ $data->anggotaPosyandu->nama_anggota }}</td>
                    <td>{{ $data->jenisPemeriksaan->nama_jenis_pemeriksaan }}</td>
                    <td>{{ $data->tanggal_pemeriksaan }}</td>
                    <td>
                        <a href="{{ route('pencatatan-kesehatan.show', $data->id_pencatatan_kesehatan) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('pencatatan-kesehatan.edit', $data->id_pencatatan_kesehatan) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('pencatatan-kesehatan.destroy', $data->id_pencatatan_kesehatan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
