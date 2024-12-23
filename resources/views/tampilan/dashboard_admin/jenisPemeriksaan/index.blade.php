@extends('tampilan.dashboard_admin.content')

@section('content')
<div class="container">
    <h1>Daftar Jenis Pemeriksaan</h1>
    <a href="{{ route('jenis_pemeriksaan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i>Tambah Data</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis Pemeriksaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_jenis_pemeriksaan }}</td>
                    <td>{{ $item->nama_jenis_pemeriksaan }}</td>
                    <td>
                        <a href="{{ route('jenis_pemeriksaan.edit', $item->id_jenis_pemeriksaan) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('jenis_pemeriksaan.destroy', $item->id_jenis_pemeriksaan) }}" method="POST" style="display:inline;">
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
</div>
@endsection
