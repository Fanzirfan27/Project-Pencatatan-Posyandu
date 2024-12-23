@extends('tampilan.dashboard_admin.content')

@section('content')
<div class="container">
    <h1>Tambah Jenis Pemeriksaan</h1>
    <form action="{{ route('jenis_pemeriksaan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_jenis_pemeriksaan">Nama Jenis Pemeriksaan</label>
            <input type="text" class="form-control" name="nama_jenis_pemeriksaan" id="nama_jenis_pemeriksaan" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="{{ route('jenis_pemeriksaan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
