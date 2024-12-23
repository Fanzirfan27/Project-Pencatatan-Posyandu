@extends('tampilan.index')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>
    <form action="{{ route('anggota-posyandu.update', $anggota->id_anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Anggota -->
        <div class="form-group">
            <label>Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control" value="{{ old('nama_anggota', $anggota->nama_anggota) }}" required>
        </div>

        <!-- Kategori Anggota -->
        <div class="form-group">
            <label>Kategori Anggota</label>
            <select name="kategori_anggota" class="form-control" required>
                @foreach($kategori as $item)
                    <option value="{{ $item->id_kategori_anggota }}" 
                        {{ old('kategori_anggota', $anggota->kategori_anggota) == $item->id_kategori_anggota ? 'selected' : '' }}>
                        {{ $item->nama_kategori_anggota }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}" required>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="" disabled {{ $anggota->jenis_kelamin == '' ? 'selected' : '' }}>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ old('alamat', $anggota->alamat) }}</textarea>
        </div>

        <!-- No. Telepon -->
        <div class="form-group">
            <label for="no_telepon">No. Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" 
                value="{{ old('no_telepon', $anggota->no_telepon) }}">
        </div>

        <!-- Tombol Kembali dan Perbaruhi -->
        <div class="form-group d-flex justify-content-between">
            <a href="{{ route('anggota-posyandu.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Perbarui
            </button>
        </div>
    </form>
</div>
@endsection
