@extends('tampilan.index')

@section('content')
    <h1>Edit Pencatatan Kesehatan</h1>
    <form action="{{ route('pencatatan-kesehatan.update', $pencatatanKesehatan->id_pencatatan_kesehatan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fk_id_anggota">Anggota Posyandu</label>
            <select name="fk_id_anggota" id="fk_id_anggota" class="form-control">
                @foreach($anggotaPosyandu as $anggota)
                    <option value="{{ $anggota->id_anggota }}" {{ $pencatatanKesehatan->fk_id_anggota == $anggota->id_anggota ? 'selected' : '' }}>
                        {{ $anggota->nama_anggota }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fk_jenis_pemeriksaan">Jenis Pemeriksaan</label>
            <select name="fk_jenis_pemeriksaan" id="fk_jenis_pemeriksaan" class="form-control">
                @foreach($jenisPemeriksaan as $jenis)
                    <option value="{{ $jenis->id_jenis_pemeriksaan }}" {{ $pencatatanKesehatan->fk_jenis_pemeriksaan == $jenis->id_jenis_pemeriksaan ? 'selected' : '' }}>
                        {{ $jenis->nama_jenis_pemeriksaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" class="form-control" value="{{ $pencatatanKesehatan->tanggal_pemeriksaan }}">
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="{{ route('pencatatan-kesehatan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>
    </form>
@endsection
