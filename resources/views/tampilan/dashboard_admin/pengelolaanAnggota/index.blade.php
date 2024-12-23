@extends('tampilan.dashboard_admin.content')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Anggota</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Anggota</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container">
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
