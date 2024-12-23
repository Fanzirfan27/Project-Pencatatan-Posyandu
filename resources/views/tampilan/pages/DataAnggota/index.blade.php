@extends('tampilan.index')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Anggota</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home_petugas') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Petugas</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container">
  <a href="{{ route('anggota-posyandu.create') }}" class="btn btn-primary mb-3">
      <i class="fas fa-plus"></i> Tambah Anggota
  </a>

  
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  <table id="anggotaTable" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_anggota }}</td>
                <td>{{ $item->kategori?->nama_kategori_anggota ?? 'Tidak ada kategori' }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>
                    <a href="{{ route('anggota-posyandu.edit', $item->id_anggota) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('anggota-posyandu.destroy', $item->id_anggota) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#anggotaTable').DataTable();
    });
</script>
@endsection
