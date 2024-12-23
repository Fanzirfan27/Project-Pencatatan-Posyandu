@extends('tampilan.dashboard_admin.content')

@section('content')
<div class="container">
    <h1>Edit Jenis Pemeriksaan</h1>
    <form action="{{ route('jenis_pemeriksaan.update', $item->id_jenis_pemeriksaan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_jenis_pemeriksaan">Nama Jenis Pemeriksaan</label>
            <input type="text" class="form-control" name="nama_jenis_pemeriksaan" id="nama_jenis_pemeriksaan" value="{{ $item->nama_jenis_pemeriksaan }}" required>
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="{{ route('jenis_pemeriksaan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
