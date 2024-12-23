@extends('tampilan.index')

@section('content')
<div class="container">
    <form action="{{ route('anggota-posyandu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_anggota">Nama Anggota</label>
            <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kategori_anggota">Kategori Anggota</label>
            <select name="kategori_anggota" id="kategori_anggota" class="form-control" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $item)
                <option value="{{ $item->id_kategori_anggota }}">{{ $item->nama_kategori_anggota }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_telepon">No. Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control">
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="{{ route('anggota-posyandu.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection